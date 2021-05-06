  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCaDmVsx9YuhF1e7gIuyPX3fcuU7daumLA",
    authDomain: "training-data-science.firebaseapp.com",
    databaseURL: "https://training-data-science.firebaseio.com",
    projectId: "training-data-science",
    storageBucket: "training-data-science.appspot.com",
    messagingSenderId: "701776923246",
    appId: "1:701776923246:web:d8ff392cc2bc739f68347f",
    measurementId: "G-N6SLVRZ4WV"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  //firebase.analytics();
  
  const auth = firebase.auth();
  
  function signup(){
	  var email = document.getElementById('email');
	  var password = document.getElementById('password');
	  
	  const promise = auth.createUserWithEmailAndPassword(email.value,password.value);
	  promise.catch(e => alert(e.message));
	  
	  alert('Sign Up');
	  
  }
  
  function signin(){
	  var email = document.getElementById('email');
	  var password = document.getElementById('password');
	  
	  const promise = auth.signInWithEmailAndPassword(email.value,password.value);
	  promise.catch(e => alert(e.message));
	  
	  alert('Sign In ' + email);
	  
  }
  
  function signout(){
	  auth.signOut();  
	  alert('Sign Out');
	  
  }
  
  auth.onAuthStateChanged(function(user){
	  if(user){
		  var email = user.email;
		  alert('Active User ' + email);
		  
		  // Similar behavior as an HTTP redirect
		  window.location.replace("../reg/");
		  
		  // Similar behavior as clicking on a link
	      //window.location.href = "../reg/";
		  
		  //is sign in
	  }
	  else{
		  // alert('No Active User');
		  // no user is sign in
		  
	  }
	  
  })