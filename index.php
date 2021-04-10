<?php 
    session_start();
 ?>
<!DOCTYPE html>
<html>


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='css/stylesheet.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <title>Break Bank</title>
</head>


<body>
    <header>
        <div class="flex-container">
            <div class="flex-child name">
                <img class=site-logo src="images/Logo.png">
                <p>Break Bank</p>
            </div>

            <div class="flex-child timer">
                <h1 id="timer"><strong id="hour">0</strong>:<strong id="minute">00</strong>:<strong id="sec">00</strong>
                </h1>

            </div>
        </div>
    </header>


    <!-- Start of Popup Modal -->
    <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="taskModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="margin: 0 auto" class="modal-title" id="exampleModalLongTitle"><strong>What is Break Bank?</strong></h3>
                </div>
                <div class="modal-body">
                    <p style="padding-left: 15px">Break bank is a productivity assistant that helps you keep track of your tasks and rewards you with break time upon completion.</p>
                    <p style="padding-left: 15px">Steps: <br> 1. Add tasks to your to do list <br> 2. Select if it is a small, medium, or large task <br> 3. When you complete the task, click on it, and it will add time to your break bank <br> 4. When you want to deposit your break
                        time, click “CASH OUT” and the timer will start! <br> 5. Open new tabs from the dashboard page during your break time <br> 6. Once the timer ends, the tabs will self-destruct. Time to get back to work!
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-start-dft" data-dismiss="modal">START</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#popupModal').modal('show');
    </script>
    <!-- End of Popup Modal -->

    <!-- Start of Task Size Modal -->
    <div class="modal fade" id="task-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="margin: 0 auto" class="modal-title" id="exampleModalLongTitle">Size of Task</h5>
                </div>
                <div class="modal-body">
                    <p style="margin: 0 auto" class="text-center"> Based on the size of your task, time will be allotted to your break bank upon completion.
                        <br> (Small: 5 minutes, Medium: 15 minutes, Large: 30 minutes, OR insert a custom time)
                    </p>
                    <br>
                    <div class="col-md-12 text-center">
                        <div class="btn-group-justified">
                            <button onclick="newElement('small')" type="button" class="btn btn-small-dft" data-dismiss="modal">Small</button>
                            <button onclick="newElement('medium')" type="button" class="btn btn-medium-dft" data-dismiss="modal">Medium</button>
                            <button onclick="newElement('large')" type="button" class="btn btn-large-dft" data-dismiss="modal">Large</button>
                        </div>
                        <div>
                            <br>
                            <input type="text" id="timeInput" placeholder="Insert Custom Time" required>
                            <button onclick="newElement('custom')" type="button" class="btn btn-custom-dft" data-dismiss="modal">Create Task</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Task Size Modal -->

    <!-- Start of To-Do-List -->
    <div class="to-do-list">
        <div id="myDIV" class="header">
            <h2>Task List</h2>
            <input style="inline-block" type="text" id="myInput" placeholder="Type your tasks here!" required>
            <span data-target="#task-modal" data-toggle="modal" class="addBtn">ADD</span>
        </div>

        <ul id="myUL">
            <li>
                <div class="circle-small-task">S</div>Free 5 minute break!
            </li>
        </ul>
    </div>

    <div class="buttons-div">
        <button id="run">CASH OUT</button>
        <button id="pause">PAUSE BREAK</button>
    </div>
    <!-- End of To-Do-List -->

    <!-- Start of Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="margin: 0 auto" class="modal-title" id="exampleModalLongTitle"><strong>Register</strong></h3>
                </div>
                <div class="modal-body modal-signup">
                    <form action="includes/signup.inc.php" method="post">
                        <input type="text" name="uname" placeholder="Username">
                        <input type="text" name="mail" placeholder="E-mail">
                        <input type="password" name="pwd" placeholder="Password">
                        <input type="password" name="pwd2" placeholder="Repeat Password">
                        <button type="submit" name="signup-submit" class="btn btn-start-dft">Sign me up!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Signup Modal -->

    <script>
        // Create a "close" button and append it to each list item
        var myNodelist = document.getElementsByTagName("LI");
        var i;
        for (i = 0; i < myNodelist.length; i++) {
            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);
            myNodelist[i].appendChild(span);
        }

        // Click on a close button to hide the current list item
        var close = document.getElementsByClassName("close");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.display = "none";
            }
        }


        //Add time to the break bank if a task is compeleted and mark as completed
        var list = document.querySelector('ul');
        list.addEventListener('click', function(ev) {
            if (ev.target.tagName === 'LI') {
                ev.target.classList.toggle('checked');
                var divClassName = ev.target.children[0].className;
                var customTimeAmount = document.getElementById("timeInput").value;
                if ((divClassName.localeCompare("circle-small-task") == 0) &&
                    !ev.target.classList.contains('checked')) {
                    addTime(-5);
            } else if ((divClassName.localeCompare("circle-small-task") == 0) &&
                ev.target.classList.contains('checked')) {
                addTime(5);
            } else if (divClassName.localeCompare("circle-medium-task") == 0 &&
                !ev.target.classList.contains('checked')) {
                addTime(-15);
            } else if (divClassName.localeCompare("circle-medium-task") == 0 &&
                ev.target.classList.contains('checked')) {
                addTime(15);
            } else if (divClassName.localeCompare("circle-large-task") == 0 &&
                !ev.target.classList.contains('checked')) {
                addTime(-30);
            } else if (divClassName.localeCompare("circle-large-task") == 0 &&
                ev.target.classList.contains('checked')) {
                addTime(30);
            } else if (divClassName.localeCompare("circle-custom-task") == 0 &&
                !ev.target.classList.contains('checked')) {
                addTime(-parseInt(customTimeAmount));
            } else if (divClassName.localeCompare("circle-custom-task") == 0 &&
                ev.target.classList.contains('checked')) {
                addTime(parseInt(customTimeAmount));
            }
            validateTime();
        }
    }, false);

        function addTime(time) {
            document.getElementById('minute').innerHTML = parseInt(document.getElementById('minute').innerHTML) + time;
        }

        function validateTime() {
            if (document.getElementById('minute').innerHTML >= 60) {
                document.getElementById('minute').innerHTML = parseInt(document.getElementById('minute').innerHTML) - 60;
                document.getElementById('hour').innerHTML = parseInt(document.getElementById('hour').innerHTML) + 1;
            } else if (document.getElementById('minute').innerHTML < 0) {
                if (document.getElementById('hour').innerHTML == 0) {
                    document.getElementById('minute').innerHTML = 0;
                } else {
                    document.getElementById('minute').innerHTML = parseInt(document.getElementById('minute').innerHTML) + 60;
                    document.getElementById('hour').innerHTML = parseInt(document.getElementById('hour').innerHTML) - 1;
                }
            }
            fixZero('minute');
        }

        function fixZero(component) {
            if (document.getElementById(component).innerHTML <= 9) {
                document.getElementById(component).innerHTML =
                "0" + document.getElementById(component).innerHTML;
            }
        }

        // Create a new list item when clicking on the "Add" button
        function newElement(size) {
            var li = document.createElement("li");
            var inputValue = document.getElementById("myInput").value;
            var div = document.createElement("div");
            var t = document.createTextNode(inputValue);

            //text variables for task size 
            var small_task = document.createTextNode("S");
            var medium_task = document.createTextNode("M");
            var large_task = document.createTextNode("L");
            var custom_task = document.createTextNode("C");
            li.appendChild(t);
            if (inputValue === '') {
                alert("You must write something!");
            } else {
                document.getElementById("myUL").appendChild(li);
            }
            document.getElementById("myInput").value = "";

            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);

            if (size.localeCompare('small') == 0) {
                div.appendChild(small_task);
                div.classList.add("circle-small-task");
            } else if (size.localeCompare('medium') == 0) {
                div.appendChild(medium_task);
                div.classList.add("circle-medium-task");
            } else if (size.localeCompare('large') == 0) {
                div.appendChild(large_task);
                div.classList.add("circle-large-task");
            } else if (size.localeCompare('custom') == 0) {
                div.appendChild(custom_task);
                div.classList.add("circle-custom-task");
            }
            li.appendChild(div);
            li.appendChild(span);

            for (i = 0; i < close.length; i++) {
                close[i].onclick = function() {
                    var div = this.parentElement;
                    div.style.display = "none";
                }
            }
        }
    </script>

    <script src="js/timer.js"></script>

    <?php
    require "footer.php";
    ?>