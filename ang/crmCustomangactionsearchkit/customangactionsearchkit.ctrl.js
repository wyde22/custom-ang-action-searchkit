(function(angular, $, _) {
    "use strict";

    angular.module('crmCustomangactionsearchkit').controller('customangactionsearchkit',function(
        $scope,
        $filter,
        $timeout,
        crmApi4,
        searchTaskBaseTrait)
    {
        var ts = $scope.ts = CRM.ts('Ma nouvelle popup action searchkit'),
            // Combine this controller with model properties (ids, entity, entityInfo) and searchTaskBaseTrait
            ctrl = angular.extend(this, $scope.model, searchTaskBaseTrait);

        this.entityTitle = this.getEntityTitle();
        this.values = [];
        this.todayDpicker = new Date();
        this.autocomplete = [];
        this.selectDatePicker = null;
        this.today = new Date();
        this.contactHero = null;
        this.add = null;
        this.selectValue = null;
        this.check = null;
        this.message = '';

        // set value checkbox
        $scope.checkboxModel = {
            value1 : true,
        };

        // set default date in date picker
        // CiviCRM format datepicker. For set the field it's necessary to apply $filter of angular
        // format date : english format
        ctrl.todayDpicker = $filter('date')(new Date(), 'yyyy-MM-dd');

        // primary query for the test
        crmApi4(this.entity, 'get', {
            select: ["id", "display_name"],
            where: [["contact_sub_type", "=", "H_ro"]]
        }).then(function(contacts) {
            // do something with contacts array
            angular.forEach(contacts, function(value,index){
                ctrl.values.push({
                    id: value.id,
                    display_name: value.display_name
                })
            });
        }, function(failure) {
            // handle failure
        });
        // end primary query

        // Select autocomplete with API
        crmApi4('Contact', 'autocomplete', {}).then(function(results) {
            // do something with results array
            ctrl.autocomplete.push(results);
        }, function(failure) {
            // handle failure
        });
        // end Select autocomplete with API

        // normal select with autocomplete
        function fieldInUse(fieldName) {
            return _.includes(_.collect(ctrl.values, 0), fieldName);
        }

        this.availableFields = function() {
            // ctrl.values is an array of values
            // for the select it's necessary to use data in array like this {id: item.id, text: item.display_name}
            // the add variable is necessary for use correctly the select : this.add. This variable is use in template
            // with ng-model
            var results = _.transform(ctrl.values, function(result, item) {
                var formatted = {id: item.id, text: item.display_name};
                if (fieldInUse(item.display_name)) {
                    formatted.disabled = true;
                }
                result.push(formatted);
            }, []);
            return {results: results};
        };
        // end normal select with autocomplete

        this.getEventDate = function(today) {
            return this.selectDatePicker = today;
        }

        this.getContactSelectAutocomplete = function(contact) {
            return this.contactHero = contact;
        }

        // retrieve value on change in normal select with autocomplete
        this.getValueSelectChange = function(contact) {
            return this.selectValue = contact;
        }
        // end function

        // retrieve value on change checkbox
        this.getCheckboxInput = function($check) {
            if($check) {
                this.message = 'Checkbox activée !!';
            } else {
                this.message = 'Checkbox désactivée !!'
            }

            return this.message;
        }
        // end function

        // Save the data for change for example the birth date of contact
        // selected in element autocomplete select
        this.save = function() {
            crmApi4('Contact', 'update', {
                values: {"birth_date":this.todayDpicker},
                where: [["id", "=", this.contactHero]]
            }).then(function(results) {
                // do something with results array
            }, function(failure) {
                // handle failure
            });
        };
        // end save function

    });

})(angular, CRM.$, CRM._);