<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  background: #f0f0f0; /* Background color for the neumorphic effect */
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
  border-radius: 10px; /* Adjust the border-radius as needed */
  box-shadow: inset 4px 4px 6px #c0c0c0, inset -4px -4px 6px #ffffff; /* Neumorphic inset shadow */
}

.input-group label {
  position: absolute;
  top: 10px;
  left: 10px;
  padding-left: 5px;
  font-weight: 500;
  color: #aaa;
  background: #f0f0f0; /* Background color for label */
  border-radius: 10px; /* Adjust the border-radius as needed */
  box-shadow: 2px 2px 4px #c0c0c0, -2px -2px 4px #ffffff; /* Neumorphic inset shadow for label */
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

.above {
  z-index: 1;
}

.below {
  z-index: 0;
}

.turned {
  opacity: 0.8;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
}

.sign-up-card, .log-in-card {
  box-shadow: 0 19px 38px rgba(0, 0, 0, 0.3), 0 15px 12px rgba(0, 0, 0, 0.22);
}

.sign-up-card.turned {
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feGaussianBlur stdDeviation="0.8" /></filter></svg>#filter');
  -webkit-filter: blur(0.8px);
  filter: blur(0.8px);
  webkit-filter: blur(0.8px);
  -webkit-transform: rotateZ(-90deg) translate3d(0, 100px, 0) scale(0.7);
  transform: rotateZ(-90deg) translate3d(0, 100px, 0) scale(0.7);
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.log-in-card.turned {
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feGaussianBlur stdDeviation="1" /></filter></svg>#filter');
  -webkit-filter: blur(1px);
  filter: blur(1px);
  webkit-filter: blur(1px);
  -webkit-transform: rotateZ(-90deg) translateX(0px) translateY(100px) scale(0.7);
  transform: rotateZ(-90deg) translateX(0px) translateY(100px) scale(0.56);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
}

.animation-state-1 .sign-up-card.below {
  -webkit-transform: rotateZ(-7deg) translateY(150px) scale(0.78);
  transform: rotateZ(-7deg) translateY(150px) scale(0.78);
  opacity: 1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feGaussianBlur stdDeviation="0.4" /></filter></svg>#filter');
  -webkit-filter: blur(0.4px);
  filter: blur(0.4px);
  webkit-filter: blur(0.4px);
}

.animation-state-1 .log-in-card.above {
  -webkit-transform: rotateZ(-83deg) translateY(-180px) translateX(100px) scale(0.78);
  transform: rotateZ(-83deg) translateY(-180px) translateX(100px) scale(0.78);
  opacity: 1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feGaussianBlur stdDeviation="0.5" /></filter></svg>#filter');
  -webkit-filter: blur(0.5px);
  filter: blur(0.5px);
  webkit-filter: blur(0.5px);
}

.animation-state-finish .sign-up-card.above {
  -webkit-transform-origin: left top;
  transform-origin: left top;
  -webkit-transform: rotateZ(5deg) translateY(0px) scale(1);
  transform: rotateZ(5deg) translateY(0px) scale(1);
  opacity: 1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feGaussianBlur stdDeviation="0" /></filter></svg>#filter');
    -webkit-filter: blur(0);
    filter: blur(0);
    webkit-filter: blur(0);
}
  .sign-up-card.below{
    filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feGaussianBlur stdDeviation="0.4" /></filter></svg>#filter');
    -webkit-filter: blur(0.4px);
    filter: blur(0.4px);
    webkit-filter: blur(0.4px);
    -webkit-transform: rotateZ(-90deg) translate3d(0, 100px, 0) scale(0.7);
    transform: rotateZ(-90deg) translate3d(0, 100px, 0) scale(0.7);
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    opacity: 0.7;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
  }
    </style>

</head>
<body>
    
        <div class="form-collection">
        <div class="card elevation-3 limit-width log-in-card below turned">
            <div class="card-body">
              <div class="input-group email">
                <input type="text" placeholder="Email" />
              </div>
              <div class="input-group password">
                <input type="password" placeholder="Password" />
              </div>
            <div class="input-group role">
              <div class="column">
                <label for="login-role">Login as:</label>
              </div>
              <div class="column">
                <select id="login-role" name="login-role" class="rounded-select">
                  <option value="donor">Donor</option>
                  <option value="admin">Admin</option>
                </select>
              </div>
            </div>
              <a href="#" class="box-btn">Forgot Password?</a>
            </div>
            <div class="card-footer">
              <button type="submit" class="login-btn">Log in</button>
            </div>
          </div>

                  <div class="card elevation-2 limit-width sign-up-card above">
                    <div class="card-body">
                      <div class="input-group fullname">
                        <input type="text" placeholder="Full Name"/>
                      </div>
                      <div class="input-group email">
                        <input type="email" placeholder="Email"/>
                      </div>
                      <div class="input-group password">
                        <input type="password" placeholder="Password"/>
                      </div>

                    <div class="input-group role">
                      <div class="column">
                        <label for="login-role">Sign as:</label>
                      </div>
                      <div class="column">
                        <select id="login-role" name="login-role" class="rounded-select">
                          <option value="donor">Donor</option>
                          <option value="admin">Admin</option>
                        </select>
                      </div>
                   </div>

                    </div>


                    <div class="card-footer">
                      <button type="submit" class="signup-btn">Sign Up</button>
                    </div>
                  </div>
                </div>
              </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $(document).on('click', '.below button', function(){
        var belowCard = $('.below'),
            aboveCard = $('.above'),
            parent = $('.form-collection');
        parent.addClass('animation-state-1');
        setTimeout(function(){
        belowCard.removeClass('below');
        aboveCard.removeClass('above');
        belowCard.addClass('above');
        aboveCard.addClass('below');
        setTimeout(function(){
            parent.addClass('animation-state-finish');
            parent.removeClass('animation-state-1');
            setTimeout(function(){
            aboveCard.addClass('turned');
            belowCard.removeClass('turned');
            parent.removeClass('animation-state-finish');
            }, 300)
        }, 10)
        }, 300);
    });
    });
</script>
</body>
</html>