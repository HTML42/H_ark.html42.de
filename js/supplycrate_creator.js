/**
 * Mark's SupplyCrate-Creator
 */
var SCC = {
    init: function () {
        if ($('.scc_form').length) {
            SCC.add_set();
            SCC.add_item();
            SCC.remake_set_dropdown();
            //
            $('.scc_form').submit(function (e) {
                e.preventDefault();
                return false;
            });
            $('.scc_form[name="supplycrateform"]').change(function () {
                SCC.render_preview('supplycrateform');
            }).submit(SCC.submit_supplycrate);
            $('.scc_form[name="supplycratesetform"]').change(function () {
                //SCC.render_preview('supplycratesetform');
            }).submit(SCC.submit_set);
        }
    },
    render_preview: function (name) {
        var data = SCC.get_form(name);
        var current_sets = cookie('item_sets') || {};
        if (isset(supplycrate_presets) && $$.length(supplycrate_presets) > 0) {
            $$.foreach(supplycrate_presets, function (preset) {
                current_sets[preset.set_name] = preset;
            });
        }
        if (name == 'supplycrateform' && data.supplycrate_sets && data.supplycrate_sets.length) {
            var supplycrate_params = 'MinItemSets=1,MaxItemSets=' + data.supplycrate_sets.length + ',NumItemSetsPower=1.0,bSetsRandomWithoutReplacement=true';
            //
            var code_lines = [];
            code_lines.push('ConfigOverrideSupplyCrateItems=(');
            /**/code_lines.push('SupplyCrateClassString="' + data.type + '",' + supplycrate_params + ',ItemSets=(');
            //##Sets
            $$.foreach(data.supplycrate_sets, function (set_name, index) {
                if (index > 0) {
                    code_lines.push(',');
                }
                var set_data = current_sets[set_name];
                code_lines.push('(');
                /**/code_lines.push('MinNumItems=1,MaxNumItems=10,NumItemsPower=1.0,SetWeight=1.0,bItemsRandomWithoutReplacement=true,');
                /**/code_lines.push('ItemEntries=(');
                //##Items
                $$.foreach(set_data.items, function (item, index) {
                    if (index > 0) {
                        code_lines.push(',');
                    }
                    code_lines.push('(');
                    code_lines.push('EntryWeight=' + (item.chance / 100) + ',ItemClassStrings=("' + item.classname + '"),ItemsWeights=(1.0),');
                    code_lines.push('MinQuantity=1,MaxQuantity=' + item.quantity + ',' +
                            'MinQuality=' + item.quality_min + ',MaxQuality=' + item.quality_max + ',' +
                            'bForceBlueprint=false,ChanceToBeBlueprintOverride=0.0');
                    code_lines.push(')');
                });
                /**/code_lines.push(')');
                code_lines.push(')');
            });
            /**/code_lines.push(')');
            code_lines.push(')');
            //
            $('.scc_preview').html(code_lines.join('<br/>')).data('code', code_lines.join(''));
        }
    },
    remake_set_dropdown: function () {
        var current_sets = cookie('item_sets') || {};
        if (isset(supplycrate_presets) && $$.length(supplycrate_presets) > 0) {
            $$.foreach(supplycrate_presets, function (preset) {
                current_sets[preset.set_name] = preset;
            });
        }
        $('.scc_addset select').children().remove();
        $$.foreach(current_sets, function (set_data, name) {
            $('.scc_addset select').append('<option value="' + name + '">' + name + '</option>');
        });
    },
    add_set: function () {
        $('.scc_addset button').click(function (e) {
            e.preventDefault();
            var chosen_set = $('.scc_addset select').val();
            if (chosen_set.length > 0) {
                var set_li = $('<li>' +
                        '<input type="hidden" name="supplycrate_sets[]" value="' + chosen_set + '" />' + chosen_set +
                        '<span class="remove">[REMOVE]</span>' +
                        '</li>');
                set_li.find('.remove').click(function () {
                    $(this).closest('li').remove();
                });
                $('.ssc_cratesets').append(set_li);
                SCC.render_preview('supplycrateform');
            }
            return false;
        });
    },
    add_item: function () {
        $('.scc_set_additem button').click(function (e) {
            e.preventDefault();
            var item = {};
            $('.scc_set_additem [data-item-name]').each(function () {
                var key = $(this).data('item-name');
                var value = $(this).val();
                item[key] = value;
            });
            item.chance = item.chance / 10;
            if (item.classname.length > 0) {
                console.log('Item:', item);
                var item_li = $('<li></li>');
                item_li.data('item', item);
                item_li.append(JSON.stringify(item));
                item_li.append('<span class="remove">[REMOVE]</span>');
                item_li.find('.remove').click(function () {
                    $(this).closest('li').remove();
                });
                $('.scc_set_items').append(item_li);
            }
            return false;
        });
    },
    get_form: function (name) {
        var current_form = $('.scc_form[name="' + name + '"]').serializeArray();
        var form_compiled = {};
        $$.foreach(current_form, function (input) {
            if (has_attr(input, 'name') && has_attr(input, 'value')) {
                var input_name = input['name'];
                var input_name_end = input_name.substring(input_name.length - 2);
                if (input_name_end == '[]') {
                    var real_name = input_name.substring(0, input_name.length - 2);
                    if (!has_attr(form_compiled, real_name)) {
                        form_compiled[real_name] = [];
                    }
                    form_compiled[real_name].push(input['value']);
                } else {
                    form_compiled[input_name] = input['value'];
                }
            }
        });
        return form_compiled;
    },
    submit_supplycrate: function () {
        var data = SCC.get_form('supplycrateform');
        var error = false;
        if (!isset(data.supplycrate_sets) || data.supplycrate_sets.length <= 0) {
            error = true;
            alert("Wähle ein paar SupplyCrateSets aus!");
        }
        //
        if (!error) {
            console.log('Submit SupplyCrate:', data);
            console.log($('.scc_preview').html($('.scc_preview').data('code')));
        } else {
            console.error('Errors on Submit SupplyCrate', data);
        }
    },
    submit_set: function () {
        var data = SCC.get_form('supplycratesetform');
        //
        data.items = [];
        $('.scc_set_items > li').each(function () {
            data.items.push($(this).data('item'));
        });
        //
        var error = false;
        if (data.set_name.length <= 1) {
            error = true;
            alert('Minimumlänge für Set-Namen: 2');
        }
        if (!has_attr(data, 'items') || data.items.length < 1) {
            error = true;
            alert('Mindestens ein Item muss ausgewählt sein.');
        }
        //
        if (!error) {
            console.log('Submit SupplyCrateSet:', data);
            var current_sets = cookie('item_sets') || {};
            if (has_attr(current_sets, data.set_name)) {
                data.set_name = data.set_name + '_' + $$.rand(4);
            }
            current_sets[data.set_name] = data;
            cookie('item_sets', JSON.stringify(current_sets), 360);
            //
            $('.scc_set_items').html('');
            $('form[name="supplycratesetform"]')[0].reset();
            SCC.remake_set_dropdown();
        } else {
            console.error('Errors on Submit SupplyCrateSet', data);
        }
    }
};
var Xtreme_startup_calls = Xtreme_startup_calls || [];
Xtreme_startup_calls.push(SCC.init);
