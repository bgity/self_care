/***
 SelfcareApp filter
 ***/
// custom filters
SelfcareApp.filter('getStatus', function getStatus($filter) {
    var st;
    return function (status) {
        if (status === 'E')
            st = 'Expired';
        else if (status === 'EX')
            st = 'Expiring';
        else if (status === 'A')
            st = 'Active';

        return st;
    };
});
//end 
/***********Pagination*** Mehul ************/
SelfcareApp.filter('offset', function () {
    return function (input, start) {
        start = parseInt(start, 10);
        return input.slice(start);
    };
});

/********add month Date******** Mehul ***********/
SelfcareApp.filter('expiringin', function ($filter) {
    return function (input, months) {
//        alert(input);
        var dt = new Date(input);
        //alert("month added" + dt.getMonth());
        dt.setMonth(dt.getMonth() + months);
        return dt;
    };
});
SelfcareApp.filter('moment', function () {
  return function (input, momentFn /*, param1, param2, etc... */) {
    var args = Array.prototype.slice.call(arguments, 2),
        momentObj = moment(input);
    return momentObj[momentFn].apply(momentObj, args);
  };
});
/*********string uppercas********/
SelfcareApp.filter('firstUpper', function() {
    return function(input, scope) {
        return input ? input.substring(0,1).toUpperCase()+input.substring(1).toLowerCase() : "";
    }
});

SelfcareApp.filter('wwrap',function(){
   return function(value, wordwise,max,tail){
       if(!value) return '';
       
       max= parseInt(max,18);
       if(!max) return value;
       
       if(value.length <= max) return value;
       
       value=value.substr(0,max)
         if (wordwise) {
                var lastspace = value.lastIndexOf(' ');
                if (lastspace != -1) {
                    value = value.substr(0, lastspace);
                }
            }

            return value + (tail || ' ...');                     
   };    
});
SelfcareApp.filter('trusted_html', function ($sce) {
    return function (text) {
        return $sce.trustAsHtml(text);
    };
});
SelfcareApp.filter('newlines', function () {    
    return function (text) {
         return text.replace(/\n/g, '<br/>');
    };     
});

SelfcareApp.filter('unsafe', function($sce) {
    return function(val) {
        return $sce.trustAsHtml(val);
    };
});



/******filter added by mehul for comman used******/
/***  String Filters *****/
SelfcareApp.filter("string.format", [ function() {
  return function(str){
      if (!str || arguments.length <=1 ) return str;
      var args = arguments;
      for (var i = 1; i < arguments.length; i++) {       
        var reg = new RegExp("\\{" + (i - 1) + "\\}", "gm");             
        str = str.replace(reg, arguments[i]);
      }
      return str;
    }
  }
]).filter("string.html2string", [ function() {
  return function(str){
      if (!str) return str;
      return $('<div/>').html(str).text();
    }
  }
]).filter("string.shorten", [ function() {
  return function(str,length){
      if (!str || !length || str.length <= length) return (str || '');
      return  str.substr(0, length) + (length <= 3 ? '' : '...');
    }
  }
]).filter("string.lowercase", [ function() {
  return function(str){
      return (str || '').toLowerCase();
    }
  }
]).filter("string.uppercase", [ function() {
  return function(str){
      return (str || '').toUpperCase();
    }
  }
]).filter("string.camelcase", [ function(){
 return function(str){
    return (str || '').toLowerCase().replace(/(\s.|^.)/g, function(match, group) {
        return group ? group.toUpperCase() : '';
    });
  } 
 }                
]).filter("string.trim", [ function(){
 return function(str){
    return (str || '').replace(/(^\s*|\s*$)/g, function(match, group) {
        return '';
    });
  } 
 }                
]).filter("string.trimstart", [ function(){
 return function(str){
   return (str || '').replace(/(^\s*)/g, function(match, group) {
        return '';
    });
  } 
 }                
]).filter("string.trimend", [ function(){
 return function(str){
    return (str || '').replace(/(\s*$)/g, function(match, group) {
        return '';
    });  
  } 
 }                
]).filter("string.replace", [ function(){
 return function(str, pattern, replacement, global){
    global = (typeof global == 'undefined' ? true : global);
    try {
      return (str || '').replace(new RegExp(pattern,global ? "g": ""),function(match, group) {
        return replacement;
      });  
    } catch(e) {
      console.error("error in string.replace", e);
      return (str || '');
    }     
  } 
 }                
]).filter("math.max", [ function(){
 return function(arr){
    if (!arr) return arr;
    return Math.max.apply(null, arr);  
  } 
 }                
]).filter("math.min", [ function(){
 return function(arr){
    if (!arr) return arr;
    return Math.min.apply(null, arr);   
  } 
 }                
]).filter("array.join", [ function(){
 return function(arr,seperator){
    if (!arr) return arr;
    return arr.join(seperator || ',');   
  } 
 }                
]).filter("array.reverse", [ function(){
 return function(arr){
    if (!arr) return arr;
    return arr.reverse();   
  } 
 }                
]);

SelfcareApp.filter('sumOfValue', function () {
    return function (data, key) {
		if (typeof (data) === 'undefined' && typeof (key) === 'undefined') {
			return 0;
		}
		var sum = 0;
		for (var i = 0; i < data.length; i++) {
			sum = sum + parseFloat(data[i][key]);
		}
		return sum.toFixed(2);
	}
});

SelfcareApp.filter('startFrom', function() {
	 return function(input, start) {
		 if (!input || !input.length) { return; }
		 if(input) {
			 start = +start; //parse to int
			 return input.slice(start);	
		 }
		return [];
	 }
});

/*SelfcareApp.filter('range', function() {
  return function(input, total) {
    total = parseInt(total);
    for (var i=0; i<total; i++)
      input.push(i);
    return input;
  };
});*/

SelfcareApp.filter('ageFilter', function() {
     function calculateAge(birthday) { // birthday is a date
         var ageDifMs = Date.now() - birthday.getTime();
         var ageDate = new Date(ageDifMs); // miliseconds from epoch
         return Math.abs(ageDate.getUTCFullYear() - 1970);
     }

     return function(birthdate) { 
           return calculateAge(birthdate);
     }; 
});

SelfcareApp.filter('decimalToFraction', function() {
     return function(value) { 
		  
				  if (value == undefined || value == null || isNaN(value))
					return "";

				  function _FractionFormatterHighestCommonFactor(u, v) {
					  var U = u, V = v
					  while (true) {
						if (!(U %= V)) return V
						if (!(V %= U)) return U
					  }
				  }

				  var parts = value.toString().split('.');
				  if (parts.length == 1)
					 return parts[0];
				  else if (parts.length == 2) {
					var wholeNum = parts[0];
					var decimal = parts[1];
					var denom = Math.pow(10, decimal.length);
					var decc = decimal/denom;
					var factor = _FractionFormatterHighestCommonFactor(decimal, denom);
					if(decc < 0.25)
					{
						return wholeNum;
					}
					else
					{
						return (wholeNum == '0' ? '' : (wholeNum + " ")) + (decimal / factor) + '/' + (denom / factor);
					}										
					
				  } else {
					return "";
				  }
			
     }; 
});
/* var tolerance = 1.0E-6;
				var h1=1; var h2=0;
				var k1=0; var k2=1;
				var b = x;
				do {
					var a = Math.floor(b);
					var aux = h1; h1 = a*h1+h2; h2 = aux;
					aux = k1; k1 = a*k1+k2; k2 = aux;
					b = 1/(b-a);
				} while (Math.abs(x-h1/k1) > x*tolerance);
				
		 if(h1==k1 || k1==1)
            return h1;
         else		
		    return h1+"/"+k1; */