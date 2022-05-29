<?php
    session_start();
    include('connect.php');
    // if(!isset($_SESSION['user']))
    //    header("location: login.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title> CollabHub </title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/material.css">
        <link type="text/css" rel="stylesheet" href="fonts/font.css">
        <link rel="icon" href="images/icon1.png" >
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- Sripts -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <style>
            textarea{
                display: none;
                width: 300px;
                height: 50px;
                background: #333;
                color: #ddd;
                padding: 10px;
                margin: 5px 0 -14px; 
            }
            .ans_sub{
                display: none;
                padding: 0 10px;
                height: 30px;
                line-height: 30px;
            }
            .pop{
                display: none;
                text-align: center;
                margin: 195.5px auto;
                font-size: 12px;
            }
        </style>
    </head>
    <body id="_3">
        <!-- navigation bar -->
        <a href="index.php">
            <div id="log">
                <div id="i">c</div><div id="cir">.</div><div id="ntro">ollabHub</div>
            </div>
        </a>
        <ul id="nav-bar">
            <a href="index.php"><li>Home</li></a>
			<a href="globalForum.php"><li id="home">Global Forum</li></a>
            <a href="categories.php"><li>Categories</li></a>
            <a href="ask.php"><li>Ask Question</li></a>
            <a href="contacts.php"><li>Contact</li></a>
            
            <?php 
                if(! isset($_SESSION['user'])){
            ?>
            <a href="login.php"><li>Log In</li></a>
            <a href="signup.php"><li>Sign Up</li></a>
            <?php
                }
                else{
            ?>
            <a href="profile.php"><li>Hi, <?php echo $_SESSION["user"]; ?></li></a>
            <a href="logout.php"><li>Log Out</li></a>
            <?php
                }
            ?>
        </ul>
        
        <!-- content -->
        <div id="content">
            <h4>
                <a id="title-head" href="globalForum.php"> Global Forum</a>
            </h4>
			<div id="Discussion-Threads">
				<button type="button" class="btn btn-primary" onclick="createNewThread()">Start New Thread</button>
				
				<button type="button" class="btn btn-primary">Search by Author</button>
				
				<button type="button" class="btn btn-primary" onclick="searchByTags()">Search by Tags</button>
				
			</div>	
            <br>
			<div id="threads-aryan">
				<center>
				<div class="card text-bg-light mb-3" style="max-width: 97%;">
					<div class="card-header">Sample Discussion Thread</div>
					<div class="card-body">
					<h5 class="card-title">Light card title</h5>
					<p class="card-text">Tags + Contributors</p>
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Discuss</button>
					</div>
				</div>
				<div class="card text-bg-light mb-3" style="max-width: 97%;">
					<div class="card-header">Sample Discussion Thread</div>
					<div class="card-body">
					<h5 class="card-title">LCAS</h5>
					<p class="card-text">Tags + Contributors</p>
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Discuss</button>
					</div>
				</div>
				</center>
			</div>
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">New message</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Render all the discussion threads and posts
						<form>
						<div class="mb-3">
							<label for="message-text" class="col-form-label">Message:</label>
							<textarea class="form-control" id="message-text"></textarea>
						</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Send message</button>
					</div>
					</div>
				</div>
				</div>
				</div>
            <div class="pop" id="tb">
                <center><h1><b style="font-size: 1.5em; margin: -60px auto 10px; display: block;">:)</b>Thank You For Your Answer.</h1></center>
            </div>
            <center>
                <?php
                    $no = 1;
                    $n = 1;
                    $nul=0; 
                    while($no < 7){
                ?>
                <div id="box<?php echo $no; ?>" class="open">
                    <a href=""><div id="close">X</div></a>
                    <div id="topic">
                        <?php 
                            echo "<h2 id='topic-head'>";
                            $q = 'select name, description from category where id='.$no;
                            $r = mysqli_query($conn,$q);

                            $d = mysqli_fetch_assoc($r);
                            echo $d['name'].'</h2><p id="topic-desc">'.$d['description']."<br>Explore our home page for more questions.</p>";
                        ?>
                    </div>
                    
                    <center>
                        <?php
                            $qu = "select q.question, q.answer, q.askedby, q.answeredby from quans as q, quacat as r, category as c where q.id=r.id and r.category=c.name and c.id='$no' Limit 8";
                            $re = mysqli_query($conn,$qu);
                            while($da = mysqli_fetch_assoc($re)){
                        ?>
                        <div id="qa-block">
                            <div class="question">
                                <div id="Q">Q.</div>
                                <?php echo $da['question']."<small id='sml'>Asked By: @".$da['askedby']."</small>"; ?>
                            </div>
                            <div class="answer">
                                <?php 
                                    if($da["answer"]){
                                        $nul=0;
                                        echo $da["answer"]."<br><small>Answered By: @".$da['answeredby']."</small>";
                                    }
                                    else{
                                        $nul=1;
                                        echo "<em>*** Not Answered Yet ***</em>";
                                    }
                                ?>
                                
                                <form id="f<?php echo $n; ?>" style="margin-bottom: -25px;" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post" enctype="multipart/form-data">
<!--                                    <input type="button" value="Click here to answer." id="ans_b" >-->
                                    <label style="margin-bottom: -25px;"><a id="ans_b<?php echo $n; ?>" href="#area<?php echo $no; ?>"><u>Submit your answer</u></a></label>
                                    <br>
                                    <script>
                                        $(function(){
                                            $('#ans_b<?php echo $n; ?>').click(function(e){
                                                e.preventDefault();
                                                $('#area<?php echo $n; ?>').css("display","block");
                                                $('#ar<?php echo $n; ?>').css("display","block");
                                                $('#f<?php echo $n; ?>').css("margin-bottom","0px");
                                            });
                                        });
                                    </script>
                                    <textarea id="area<?php echo $n; ?>" name="answer" placeholder="Your Answer..."></textarea>
                                    <input style="display: none;" name="question" value="<?php echo $da['question'] ?>">
                                    <input style="display: none;" name="nul" value="<?php echo $nul ?>">
                                    <input style="display: none;" name="preby" value="<?php echo $da['answeredby'] ?>">
                                    <br>
                                    <input type="submit" name="ansubmit" value="Submit" class="up-in ans_sub" id="ar<?php echo $n; ?>">
                                    
                                </form>
                                

                                
                            </div>
                        </div>
                        <?php $n++; } ?>
                    </center>
                    
                </div><!-- box1 -->
                <?php
                    $no++;
                }
                ?>
            </center>
            
        </div><!-- content -->
        
        <!-- Footer -->
        <div id="footer">
            &copy; 2022 &bull; ISTP Project.
        </div>
        <script>
			function askUser(){
				let title = prompt("Discussion Thread Title:");
				let name = prompt("Your name:");
				let tags = prompt("Thread tags: (separated by spaces)")
				var doFlag = true;
				if (title == null) doFlag = false;
				return [title, name, doFlag, tags];
			}
			
			function putThreadTitle(title, author, tags){
				// console.log(title, author, tags);
				if(author == "") author = "Anonymous";
				if(tags == "") tags = "No tags"; 
				var card = document.createElement("div");
				card.innerHTML = "<center><div class=\"card text-bg-light mb-3\" style=\"max-width: 97%;\"><div class=\"card-header\">Discussion Thread</div><div class=\"card-body\"><h5 class=\"card-title\">" + title +"</h5><p class=\"card-text\"><b><em>" + author + "</em></b>" + "<div class=\"tagzz\">" + tags + "</div>" + "</p><button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" data-bs-whatever=\"@fat\">Discuss</button></div></div></center>";
				return card;
			}
			
			function pushMe(card) {
				var element = document.getElementById("threads-aryan");
				element.appendChild(card);
			}
			
			function createNewThread() {
				info = askUser(); // store thread's name and author details
				// info[0] -> title of thread; 
				// info[1] -> name of the author
				// info[2] -> doFlag
				// info[3] -> tags
				if(info[2]) {
					card = putThreadTitle(info[0], info[1], info[3]); // create the card
					pushMe(card);
				}
				// console.log("Clicked!!!");
			}
			function removeAll(){
				var element = document.getElementById("threads-aryan");
				while (element.lastElementChild) {
					element.removeChild(element.lastElementChild);
				}
			}
			
			function putFiltered(arr){
				var element = document.getElementById("threads-aryan");
				for(var i = 0; i < arr.length; i++) pushMe(arr[i]);
			}
			
			// TODO: Store index and class name: taggz and also whole card div
			// Change this!!! Search.
			function searchByTags() {
				let userTags = prompt("Search tags: (separated by spaces)");
				var arr = userTags.split(/\s+/);
				for (var i = 0; i < userTags.length; i++) arr[i] = arr[i].toLowerCase();
				
				var eles = document.getElementsByClassName('tagzz');
				var toRetEles = [];
				for(var i = 0; i < eles.length; i++){
					bigStr = eles[i].textContent;
					arrCheck = bigStr.split(/\s+/);
					for (var j = 0; j < arrCheck.length; j++) arrCheck[j] = arrCheck[j].toLowerCase();
					for (var k = 0; k < arrCheck.length; k++){
						for(var a = 0; a < arr.length; a++){
							var found = false;
							if (arrCheck[k] == arr[a]){
								toRetEles.push(eles[i]);
								found = true;
								break;
							}
						}
						if(found) break;
					}
				}
				console.log(toRetEles);
				removeAll();
				putFiltered(toRetEles);
				return toRetEles;
			}
		
		</script>
        	
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
    
</html>
