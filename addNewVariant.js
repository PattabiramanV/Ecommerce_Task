"use strict";


        function addNewVariantsFun(){
          event.preventDefault();
            document.querySelector(".container1").style.display = 'none';
            document.querySelector(".container2").style.display = 'block';

        }

        function submitProductFun(){

                
                event.preventDefault(); // Prevent form submission
     let jsonData=JSON.parse(localStorage.getItem("user"));
                var form = event.target.closest('form'); // Find the closest parent form element
              // Object to store form data
            
                // Get all checkbox inputs
                var checkboxes = form.querySelectorAll('input[type="checkbox"]');
            
                // Iterate over checkboxes
                checkboxes.forEach(function(checkbox) {
                    // If checkbox is checked
                    if (checkbox.checked) {
                        // Find corresponding text input
                        var textInput = checkbox.nextElementSibling;
            
                        // Add input name and value to formData object
                        jsonData[textInput.getAttribute('name')] = textInput.value;
                    }
                });
            
                console.log("Form Data Object:", jsonData);
                localStorage.setItem("user",JSON.stringify(jsonData));
            location.href='./index.php'
        }

  