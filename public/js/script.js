
$(document).ready(function(){
    //   var availableTags = [
    //   "ActionScript",
    //    "AppleScript",
    //   "Asp",
    //     "BASIC",
    //    "C",
    //    "C++",
    //    "Clojure",
    //   "COBOL",
    //   "ColdFusion",
    //   "Erlang",
    //   "Fortran",
    //   "Groovy",
    //   "Haskell",
    //   "Java",
    //   "JavaScript",
    //   "Lisp",
    //   "Perl",
    //   "PHP",
    //   "Python",
    //   "Ruby",
    //   "Scala",
    //   "Scheme"
    // ];

    // var data = ['a', 'b', 'c', 'd', 'e'];

    // $('#btn').click(function(){
    //   source:availableTags
    //   alert('ok');
    // });

    // $('#seachfly').autocomplete({
    //   source:availableTags
    // });
   $('#pas').change(function(){
      var cost = document.getElementById('total_cost').value;

      var number = document.getElementById('pas').value;
      document.getElementById('total_cost').innerHTML = cost*number;
      $('#total_cost').attr('value',cost*number);
      document.getElementById('cost').innerHTML = cost*number;
      var list;
        if(number != null && number != "")
        {
        for (var i = 1; i <= number ; i++) {
           list += ["<div class='panel panel-default'><div class='panel-body'><h4>Passenger#"+i+"</h4>" +
                                        "<input type='hidden' name='total_passenger"+i+ "' value='1'>" + 
                                        "<div class='form-group row'> " +
                                             "<div class='col-sm-3'> " +
                                              "<label class='control-label'>Title:</label>"+
                                              "<select name='title"+i+"' id='title"+i+"' class='form-control'>" +
                                                  "<option value='mr' selected>Mr.</option>" +
                                                  "<option value='mrs'>Mrs.</option>"+
                                              "</select>" +
                                            "</div>"+
                                        "</div>"+
                                        "<div class='form-group col-sm-6 row'>"+
                                           " <label class='control-label'>First Name:</label>"+
                                            "<input value=''  name='pas_first_name"+i+"' type='text' class='form-control'>"+
                                        "</div>"+
                                        "<div class='form-group col-sm-6 row'>"+
                                            "<label class='control-label'>Last Name:</label>"+
                                            "<input value=''  name='pas_last_name"+i+"' type='text' class='form-control'>"+
                                        "</div></div></div>"];
        }
              document.getElementById('titlePasse').innerHTML = 'Passengers('+number+') Details';
              document.getElementById('passengers').innerHTML = list;
               $('#total_passenger').attr('value',number);
               document.getElementById('pasNumber').innerHTML = 'Passengers(x'+number+') Fare';
               
              
        }
        else if (number == null || number == "" || number <= 0)
        {
          $('#passengers').remove();
              document.getElementById('titlePasse').innerHTML = 'Passengers(0) Details';
              document.getElementById('passengers').innerHTML = '';
        }

       
   });
});


