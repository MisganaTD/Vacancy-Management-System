               function isTwo(twodigit)
	{
	                    var r=/\D$/i;
                    if(r.test(twodigit.value))
                     {
                         alert("This Field allows Only Numerics.");
                         twodigit.value="";
                         twodigit.focus();
                     }
					 if((twodigit.value).length > 2)
						 {
						 alert("Please enter valid experience!");
                         twodigit.value="";
                         twodigit.focus();
						 return false;
						 }
	}
				function isPhoneNo(phonenumber)
				{
							var asm = /^[0-9]+$/;
						 if(asm.test(phonenumber.value)==false)
						 {
						 alert("Please enter valid phone number!");
						 		phonenumber.value="";
								 phonenumber.focus();
//frm.phonenumber.focus();
						 return false;
						 }
						 if((phonenumber.value).length > 10)
						 {
						 alert("phone number Should Be of 10 Digits");
						 phonenumber.value="";
						 phonenumber.focus();
						 return false;
						 }
	            }
					function isalphanum(ele)
						{
							var r=/\W$/i;
							if(r.test(ele.value))
							 {
								 alert("This Field allows Only Alpha Numeric characters.");
								 ele.value="";
								 ele.focus();
							 }
						}
                function isalpha(ele)
                {
                    var r=/[^a-zA-Z]+/i;
                    if(r.test(ele.value))
                     {
                         alert("This Field allows Only Alphabets.");
                         ele.value="";
                         ele.focus();
                     }
					 // /^[a-zA-Z]+$; /^[a-zA-Z\s]+$/
                }
//Note: these important line of code is by misgana tesfaye /programmer/
				// r=/^[a-zA-Z\s]+$/; only display number
				// r=/[^a-zA-Z\s]+$/; is diplay only alphabet and space
				// ^ indicate not
				function isalphaandspace(ele)
				{
				 var r=/[^a-zA-Z\s]+$/;
				  if (r.test(ele.value))
					{
                      alert("This Field allows Only Alphabets and Space.");
                         ele.value="";
                         ele.focus();
                 }
		       }
			   // /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      function validateEmail(emailField)
	  {
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value)==false) 
        {
            alert('Invalid Email Address');
			emailField.value="";
			emailField.focus();
           // return false;
        }
        //return true;
 }
                function isnum(ele)
                {
                    var r=/\D$/i;
                    if(r.test(ele.value))
                     {
                         alert("This Field allows Only Numerics.");
                         ele.value="";
                         ele.focus();
                     }
                }

                function validateform(mmyform)
                {
                    var em=/[a-zA-Z0-9]+@[a-zA-Z0-9]+.[a-zA-Z]+/;
                    myform=document.forms[mmyform];
			         if(myform.employeeid.value=="" || myform.fname.value=="" || myform.mname.value=="" || myform.lname.value=="" || myform.email.value=="" || myform.telephone.value=="" || myform.deptordirec.value=="" || myform.jobtitle.value=="" || myform.position.value=="" || myform.doj.value=="" || myform.exp_year.value=="")
                     {
                         alert("Some of the fields are Empty.");
                         return false;
                         //  myform.onsubmit=false;
                     }
					
					
                     else if(myform.password.value!=myform.confirmPass.value)
                         {
                             alert("Passwords Donot Match!");
                            // myform.onsubmit=false;
                            return false;
                         }
                         else if(!em.test(myform.email.value))
                             {
                                 alert("Enter the E-mail Correctly!");
                               //  myform.onsubmit=false;
                                 return false;
                             }


                }

                function validatesubform(mmyform)
                {

                    myform=document.forms[mmyform];
                    if(myform.subname.value=="" || myform.subdesc.value=="")
                     {
                         alert("Some of the fields are Empty.");
                         myform.onSubmit=false;
                     }
                     
                }
        function validatetestform(mmyform)
                {

                   /* myform=document.forms[mmyform];
                    if(myform.subname.value=="" || myform.subdesc.value=="")
                     {
                         alert("Some of the fields are Empty.");
                         myform.onSubmit=false;
                     }
*/
                }




