<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
    integrity="sha384-o9IflTXNQ6pJFj3e5Pkej46Yy3peOgR/T46W7BGn8A2Or1hStt6E03a4AoyMApTJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>SignUp/In</title>

<style>
.form-collection{
  width: 350px;
  height: 300px;
  margin-bottom: 180px;
}
.limit-width{
  width: 300px;
}

.absolute-footer{
  bottom: 0;
  left: 0;
  position: absolute;
  z-index: 1;
  text-align: center;
  font-family: "Roboto", sans-serif;
  font-size: 27.2px;
  font-size: 1.7rem;
  font-weight: 300;
  padding: 15px;
  background: rgba(0, 0, 0, 0.4);
  color: #fff;
}

.form-collection{
  z-index: -1;
}

/* Styling Card */

.card {
  font-family: "Open Sans", sans-serif;
  background: #ecf0f3; /* Background color for the neumorphic effect */
  position: absolute;
  -webkit-transition: 0.3s ease all;
  transition: 0.3s ease all;
  border-radius: 10px;
  border: 1px solid #e0e0e0; /* Border color for the neumorphic effect */
  box-shadow: 6px 6px 12px #c0c0c0, -6px -6px 12px #ffffff; /* Neumorphic shadow */
}

.card-body {
  padding: 20px;
}

.title {
    text-align: center;
    font-size: 28px;
    padding-top: 24px;
    letter-spacing: 0.5px;
    color: #136767;
    text-shadow: 2px 2px 4px #c0c0c0, -2px -2px 4px #ffffff; /* Neumorphic text shadow */
}


.input-group i {
    position: absolute;
    top: 50%;
    left: 10px; /* Adjust the left position to align the icon */
    transform: translateY(-50%);
    font-size: 20px; /* Adjust the size of the icon */
    color: #555; /* Adjust the color of the icon */
}


.box-btn {
  text-decoration: none;
  text-align: center;
  text-transform: uppercase;
  display: block;
  padding: 15px;
  font-size: 16px;
  font-weight: 500;
  color: #fe3f40;
  background: rgba(0, 0, 0, 0);
  -webkit-transition: 0.2s ease all;
  transition: 0.2s ease all;
  border-radius: 3px;
}

.box-btn:hover {
  background: rgba(0, 0, 0, 0.06);
}

.box-btn:active {
  background: rgba(0, 0, 0, 0.1);
}

.input-group {
  background: #f0f0f0; /* Background color for the neumorphic effect */
  border: 2px solid #e0e0e0; /* Border color for the neumorphic effect */
  position: relative;
  margin: 15px 0;
  border-radius: 10px; /* Adjust the border-radius as needed */
  overflow: hidden;
  padding: 10px;
  box-shadow: 6px 6px 12px #c0c0c0, -6px -6px 12px #ffffff; /* Neumorphic shadow */
}


.input-group input {
    border: none;
    background: transparent;
    width: 100%;
    outline: none;
    font-weight: 500;
    font-family: "Open Sans", sans-serif;
    font-size: 16px;
    padding: 10px;
    border-radius: 10px;
    box-shadow: inset 4px 4px 6px #c0c0c0, inset -4px -4px 6px #ffffff;
    padding-left: 40px; /* Add padding to the left to make space for the icon */
}

.input-group i {
    position: absolute;
    top: 50%;
    left: 20px; /* Adjust this value to control the distance from the left */
    transform: translateY(-50%);
    color: #aaa; /* Color of the icon */
}

.input-group label {
    position: absolute;
    top: 10px;
    left: 40px; /* Adjust this value to control the distance from the left */
    padding-left: 5px;
    font-weight: 500;
    color: #aaa;
    background: #f0f0f0;
    border-radius: 10px;
    box-shadow: 2px 2px 4px #c0c0c0, -2px -2px 4px #ffffff;
}

.input-group.role {
  display: flex;
}

.column {
  flex: 1;
  margin-right: 10px; /* Add margin between the label and the select element */
}

.rounded-select {
  border-radius: 15px; /* Adjust the value to control border radius */
  padding: 4px; /* Adjust the value to control the height */
  width: 100%; /* Adjust the width as needed */
}

.card-footer button {
  width: 100%;
  padding: 18px;
  font-size: 24px;
  font-size: 1.5rem;
  text-transform: uppercase;
  font-weight: 600;
  background: #03a4ed;
  border: none;
  color: #fff;
  border-radius: 10px; /* Adjust the border-radius as needed */
  box-shadow: 4px 4px 6px #c0c0c0, -4px -4px 6px #ffffff; /* Neumorphic shadow for buttons */
  outline: none;
  cursor: pointer;
  transition: all 0.3s; /* Add a smooth transition effect */
}

.card-footer button:hover {
  background: #0390c1; /* Change background color on hover */
  transform: translateY(2px); /* Add a slight hover effect */
  box-shadow: 2px 2px 4px #c0c0c0, -2px -2px 4px #ffffff; /* Neumorphic shadow on hover */
}

.card-footer {
  background: #f0f0f0; /* Background color for the neumorphic effect */
  border: 1px solid #e0e0e0; /* Border color for the neumorphic effect */
  border-radius: 10px; /* Adjust the border-radius as needed */
  margin-top: 5px; /* Add some space between the card body and the footer */
  padding: 10px;
}

    </style>

</head>
<body>
    
    <div class="form-collection">

        <div class="card">

         <form method="POST" action="((URL::to('loginUser'))" enctype="multipart/form-data">
            @csrf
                <div class="card-body">

                <div class="title">LOGIN FORM</div>

                <div class="input-group email">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email" required/>
                </div>
                <div class="input-group password">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" required/>
                </div>


                    <a href="#" class="box-btn">Forgot Password?</a>
                  </div>

                    <div class="card-footer">
                      <button type="submit" name="login" class="login-btn">Log in</button>
                    </div>
                </div>
          </form>   
      
        </div>  
    </div>

</body>


</html>