/***
GLobal Directives
***/

// Route State Load Spinner(used on page or content load)
SelfcareApp.directive('ngSpinnerBar', ['$rootScope',
    function($rootScope) {
        return {
            link: function(scope, element, attrs) {
                // by defult hide the spinner bar
                element.addClass('hide'); // hide spinner bar by default

                // display the spinner bar whenever the route changes(the content part started loading)
                $rootScope.$on('$stateChangeStart', function() {
                    element.removeClass('hide'); // show spinner bar
                });

                // hide the spinner bar on rounte change success(after the content loaded)
                $rootScope.$on('$stateChangeSuccess', function() {
                    element.addClass('hide'); // hide spinner bar
                    $('body').removeClass('page-on-load'); // remove page loading indicator
                    Layout.setSidebarMenuActiveLink('match'); // activate selected link in the sidebar menu
                   
                    // auto scorll to page top
                    setTimeout(function () {
                        Metronic.scrollTop(); // scroll to the top on content load
                    }, $rootScope.settings.layout.pageAutoScrollOnLoad);     
                });

                // handle errors
                $rootScope.$on('$stateNotFound', function() {
                    element.addClass('hide'); // hide spinner bar
                });

                // handle errors
                $rootScope.$on('$stateChangeError', function() {
                    element.addClass('hide'); // hide spinner bar
                });
            }
        };
    }
])

// Handle global LINK click
SelfcareApp.directive('a', function() {
    return {
        restrict: 'E',
        link: function(scope, elem, attrs) {
            if (attrs.ngClick || attrs.href === '' || attrs.href === '#') {
                elem.on('click', function(e) {
                    e.preventDefault(); // prevent link click for above criteria
                });
            }
        }
    };
});

// Handle Dropdown Hover Plugin Integration
SelfcareApp.directive('dropdownMenuHover', function () {
  return {
    link: function (scope, elem) {
      elem.dropdownHover();
    }
  };  
});

SelfcareApp.directive("initialValue",function(){return{restrict:"A",controller:["$scope","$element","$attrs","$parse",function(e,t,i,a){var o,l,n,r;r=t[0].tagName.toLowerCase(),n=i.initialValue||t.val(),"input"===r&&("checkbox"===t.attr("type")?n=t[0].checked?!0:void 0:"radio"===t.attr("type")&&(n=t[0].checked||void 0!==t.attr("selected")?t.val():void 0)),i.ngModel&&(o=a(i.ngModel),(l=o.assign)(e,n))}]}});"undefined"!=typeof module&&"undefined"!=typeof exports&&module.exports===exports&&(module.exports=initialValueModule);

var ValidSubmit = ['$parse', function ($parse) {
        return {
            compile: function compile(tElement, tAttrs, transclude) {
                return {
                    post: function postLink(scope, element, iAttrs, controller) {
                        var form = element.controller('form');
                        form.$submitted = false;
                        var fn = $parse(iAttrs.validSubmit);
                        element.on('submit', function (event) {
                            scope.$apply(function () {
                                element.addClass('ng-submitted');
                                form.$submitted = true;
                                if (form.$valid) {
                                    fn(scope, {$event: event});
                                }
                            });
                        });
                        scope.$watch(function () {
                            return form.$valid
                        }, function (isValid) {
                            if (form.$submitted == false)
                                return;
                            if (isValid) {
                                //element.removeClass('has-error').addClass('has-success');
                            } else {
                                //element.removeClass('has-success');
                                //element.addClass('has-error');
                            }
                        });
                    }
                }
            }
        }
    }]
SelfcareApp.directive('validSubmit', ValidSubmit);

/*SelfcareApp.directive('updateValue', function () {
  return function(scope, element, attr){
        console.log(scope, element, attr);

        element.bind("click", function(){
            console.log("Need to change the model value but dont know how to yet");
			ngModel.$setViewValue('7');
        })
    }  
});*/



//Directive for adding options html on click of button
SelfcareApp.directive("addbuttons", function($compile){
	return function(scope, element, attrs){
		element.bind("click", function(){
			scope.optcount++;
			if(attrs.countopt) {
				if(scope.count==1)
					scope.count=attrs.countopt;
				else
					scope.count++;
			}
			else {
				scope.count++;
			}
			//alert(attrs.checkedm+'=='+scope.optcount+'=='+scope.count)
			/*angular.element(document.getElementById('space-for-newrows'+attrs.checkedm+'')).append($compile("<div id='row"+attrs.checkedm+'_'+scope.count+"' class='text-left'>Option:&nbsp;<input type='text' ng-model='formData.fooditems["+attrs.checkedm+"]["+scope.count+"][0].item' typeahead='fooditem.name for fooditem  in fooditems | filter:$viewValue' class='form-control input-inline input-small' typeahead-editable='false'><input type='text' placeholder='Exch' ng-model='formData.fooditems["+attrs.checkedm+"]["+scope.count+"][0].exch' class='form-control input-inline input-xsmall amt_input'><span id='optionItem"+attrs.checkedm+"_"+scope.optcount+"'></span><button type='button' class='btn btn-xs blue' addoptitem checkedi='"+attrs.checkedm+"' checkopt='"+scope.optcount+"'>Add</button><a class='btn btn-xs blue pull-right' ng-click='delOpt("+attrs.checkedm+','+scope.count+")'><i class='fa fa-times'>Del</i></a><div class='clearfix'>&nbsp;</div></div>")(scope));*/
			angular.element(document.getElementById('space-for-newrows'+attrs.checkedm+'')).append($compile("<div id='row"+attrs.checkedm+'_'+scope.count+"' class='text-left'>Option:&nbsp;<input type='text' class='form-control input-inline input-small' ng-model='formData.fooditems["+attrs.checkedm+"][\"aoptions\"]["+scope.count+"][0].item' typeahead='fooditem.name for fooditem  in getFitems($viewValue)'  typeahead-template-url='typeahead-item.html' typeahead-editable='false'><input type='text' placeholder='Exch' ng-model='formData.fooditems["+attrs.checkedm+"][\"aoptions\"]["+scope.count+"][0].exch' class='form-control input-inline input-xsmall amt_input'><span id='optionItem"+attrs.checkedm+"_"+scope.optcount+"'></span><button type='button' class='btn btn-xs blue' addoptitem checkedi='"+attrs.checkedm+"' checkopt='"+scope.optcount+"'>Add</button><a class='btn btn-xs blue pull-right' ng-click='delOpt("+attrs.checkedm+','+scope.count+")'><i class='fa fa-times'>Del</i></a><div class='clearfix'>&nbsp;</div></div>")(scope));
		});
	};
});
//Directive for adding options html on click of button
SelfcareApp.directive("addbuttonsa", function($compile){
	return function(scope, element, attrs){
		element.bind("click", function(){
			
			if(attrs.countopt) {
				if(scope.count==1 && attrs.countopt>1)
					scope.count=attrs.countopt;
				else
					scope.count++;
			}
			else {
				scope.count++;
			}
			scope.optcount++;
			//alert(attrs.checkedm+'=='+scope.optcount+'=='+scope.count)
			/*angular.element(document.getElementById('space-for-newrows'+attrs.checkedm+'')).append($compile("<div id='row"+attrs.checkedm+'_'+scope.count+"' class='text-left'>Option:&nbsp;<input type='text' ng-model='formData.fooditems["+attrs.checkedm+"]["+scope.count+"][0].item' typeahead='fooditem.name for fooditem  in fooditems | filter:$viewValue' class='form-control input-inline input-small' typeahead-editable='false'><input type='text' placeholder='Exch' ng-model='formData.fooditems["+attrs.checkedm+"]["+scope.count+"][0].exch' class='form-control input-inline input-xsmall amt_input'><span id='optionItem"+attrs.checkedm+"_"+scope.optcount+"'></span><button type='button' class='btn btn-xs blue' addoptitem checkedi='"+attrs.checkedm+"' checkopt='"+scope.optcount+"'>Add</button><a class='btn btn-xs blue pull-right' ng-click='delOpt("+attrs.checkedm+','+scope.count+")'><i class='fa fa-times'>Del</i></a><div class='clearfix'>&nbsp;</div></div>")(scope));*/
			angular.element(document.getElementById('space-for-newrows'+attrs.checkedm+'')).append($compile("<div id='row"+attrs.checkedm+'_'+scope.count+"' class='text-left'>Option:&nbsp;<input type='text' class='form-control input-inline input-small' ng-model='formData.fooditems["+attrs.checkedm+"][\"aoptions\"]["+scope.count+"][0].item' typeahead='fooditem.name for fooditem  in getFitems($viewValue)'  typeahead-template-url='typeahead-item.html' typeahead-editable='false'><input type='text' placeholder='Exch' ng-model='formData.fooditems["+attrs.checkedm+"][\"aoptions\"]["+scope.count+"][0].exch' class='form-control input-inline input-xsmall amt_input'><span id='optionItem"+attrs.checkedm+"_"+scope.count+"'></span><button type='button' class='btn btn-xs blue' addoptitem checkedi='"+attrs.checkedm+"' checkopt='"+scope.count+"'>Add</button><a class='btn btn-xs blue pull-right' ng-click='delOpt("+attrs.checkedm+','+scope.count+")'><i class='fa fa-times'>Del</i></a><div class='clearfix'>&nbsp;</div></div>")(scope));
		});
	};
});
//Directive for adding option items html on click of button
SelfcareApp.directive("addoptitem", function($compile){
	return function(scope, element, attrs){
		element.bind("click", function(){
			if(attrs.countitm)
			{
				if(scope.icount==0)
					scope.icount=attrs.countitm;
				else
					scope.icount++;				
			}					
			else {
				scope.icount++;
			}
			//alert(attrs.checkopt+'==='+scope.icount)
			angular.element(document.getElementById('optionItem'+attrs.checkedi+'_'+(attrs.checkopt)+'')).append($compile("<span id='col"+attrs.checkedi+'_'+attrs.checkopt+'_'+scope.icount+"' style='padding: 10px;'><input type='text' class='form-control input-inline input-small' ng-model='formData.fooditems["+attrs.checkedi+"][\"aoptions\"]["+attrs.checkopt+"]["+scope.icount+"].item' data-typeahead='fooditem.name for fooditem  in getFitems($viewValue) ' typeahead-template-url='typeahead-item.html'  typeahead-editable='false'><input type='text' placeholder='Exch' ng-model='formData.fooditems["+attrs.checkedi+"][\"aoptions\"]["+attrs.checkopt+"]["+scope.icount+"].exch' class='form-control input-inline input-xsmall amt_input'><a ng-click='delOpItem("+attrs.checkedi+','+attrs.checkopt+','+scope.icount+")'><i class='fa fa-times'></i></a></span>&nbsp;&nbsp;")(scope));
		});
	};
});

//Directive for adding option items html on click of button
SelfcareApp.directive("addoptitema", function($compile){
	return function(scope, element, attrs){
		element.bind("click", function(){
			//scope.count++;
			//alert(attrs.countitm)
			if(attrs.countitm)
			{
				if(scope.icount==0)
					scope.icount=attrs.countitm;
				else
					scope.icount++;				
			}					
			else {
				scope.icount++;
			}
			   
			//scope.optcount++;
			alert(+attrs.checkedi+"--"+attrs.checkopt+"--"+scope.icount);
			angular.element(document.getElementById('optionItem'+attrs.checkedi+'_'+(attrs.checkopt)+'')).append($compile("<span id='col"+attrs.checkedi+'_'+attrs.checkopt+'_'+scope.icount+"' style='padding: 10px;'><input type='text' class='form-control input-inline input-small' ng-model='formData.fooditems["+attrs.checkedi+"][\"aoptions\"]["+attrs.checkopt+"]["+scope.icount+"].item' data-typeahead='fooditem.name for fooditem  in getFitems($viewValue) ' typeahead-template-url='typeahead-item.html'  typeahead-editable='false'><input type='text' placeholder='Exch' ng-model='formData.fooditems["+attrs.checkedi+"][\"aoptions\"]["+attrs.checkopt+"]["+scope.icount+"].exch' class='form-control input-inline input-xsmall amt_input'><a ng-click='delOpItem("+attrs.checkedi+','+attrs.checkopt+','+scope.icount+")'><i class='fa fa-times'></i></a></span>&nbsp;&nbsp;")(scope));
		
		});
	};
});



(function (angular) {
    'use strict';

    function printDirective() {
        var printSection = document.getElementById('printSection');

        // if there is no printing section, create one
        if (!printSection) {
            printSection = document.createElement('div');
            printSection.id = 'printSection';
            document.body.appendChild(printSection);
        }

        function link(scope, element, attrs) {
            element.on('click', function () {
                var elemToPrint = document.getElementById(attrs.printElementId);
                if (elemToPrint) {
                    printElement(elemToPrint);
                    window.print();
                }
            });

            window.onafterprint = function () {
                // clean the print section before adding new content
                printSection.innerHTML = '';
            }
        }

        function printElement(elem) {
            // clones the element you want to print
            var domClone = elem.cloneNode(true);
            printSection.appendChild(domClone);
        }

        return {
            link: link,
            restrict: 'A'
        };
    }

    SelfcareApp.directive('ngPrint', [printDirective]);
}(window.angular));