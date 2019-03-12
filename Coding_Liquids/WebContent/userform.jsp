<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
    
<%@page import="java.util.Base64" import="java.io.UnsupportedEncodingException" %>
    <%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
    <%@ taglib prefix="sql" uri="http://java.sun.com/jsp/jstl/sql" %>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-control" content="no-cache">
    <title>Events | Coding Liquids</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/events.css">
</head>
<body>
<!---content to be displayed after loading-->
<div class="wrapper">
    <div class="container-fluid">
        <div class="hamburger">
            <span>menu </span>
            <span class="close">close</span>
            <i class="material-icons close">close</i>
            <i class="material-icons">menu</i>
        </div>
    </div>
    <!---Fullscreen menu-->
    <div class="menu hidden">
        <div class="container">
              <h4>MENU</h4>
                <div class="row">
                    <div class="col-2">
                        <ul>
                          <li><a href="index.html">Home</a></li>
                            
                          <li><a href="team.html">Team</a></li>
                        <!--     <li><a href="comingsoon">Portfolio</a></li> -->

                       <li><a href="careers.jsp">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <ul>
                            <li><a href="event.jsp">Workshops/Trainings </a></li>
                            <li><a href="allevents.jsp">What We Do</a></li>
                        <li><a href="software.html">Softwares</a></li>
                      
                        </ul>
                    </div>
                    
                    <ul>
                    </ul>
                    
                </div>
                <!---end of row-->

                <div class="get-quote">
                    <h5>Have a project in mind?</h5>
                    <a href="project.html" class="call-to-action">Lets Talk</a>
                </div>
            <div class="social">
                <div class="icon-wrapper"><a href=""> <img src="img/insta.svg" alt="Instagram Icon"></a> </div>
                <div class="icon-wrapper"><a href=""><img src="img/fb.svg" alt="Facebook Icon"></a></div>
                <div class="icon-wrapper"><a href=""><img src="img/twit.svg" alt="Twitter Icon"></a></div>
            </div>

        </div>
    </div>

   
             
<%! String profile;
	int id;%>
	<%profile=(String)request.getAttribute("id");
	//out.println(profile);
	%>
          <sql:setDataSource
	        var="con"
	        driver="com.mysql.jdbc.Driver"
	       url="jdbc:mysql://localhost:3306/cl"
	        user="root" password=""  /> 
	    
	
	     
	        <sql:query var="listUsers"   dataSource="${con}">
	        SELECT * FROM event where id='<%=profile %>';
	    </sql:query>
	         <c:forEach var="user"
                     items="${listUsers.rows}">
         
       
          
    

    <div class="hero-img">
      <div class="container">
      <h4>Workshop on</h4>
        <h2>${user.name }</h2><br>
         <h3>Venue : ${user.venue }</h3><br>
       <h3>Date : ${user.start } to  ${user.end }</h3>
        <h5>Fees : ${user.fee } </h5s>
       
       
      </div>
      </div>
                 

      <section id="contact">
        <div class="container">

            <form method="post" action="add" id="contactForm" class="col s6">

              <div class="row">
                <div class="col-2">
                <div class="form-element"><label for="name">Your Name</label>
                <input type="text" name="name" placeholder="Type Your name" required autofocus></div>
              </div>
              <div class="col-2">
              <div class="form-element">
                <label for="name">Your Email</label>
                <input type="email" name="email" placeholder="Type Your email"  required>
              </div>
            </div>
          </div>
          
              <div class="row">
                <div class="col-2">
                <div class="form-element"><label for="name">Year/Class</label>
                <input type="text" name="yr" placeholder="Type Your year/class" required autofocus></div>
              </div>
              <div class="col-2">
              <div class="form-element">
                <label for="name">Department</label>
                <input type="dep" name="dep" placeholder="Type Your dept."  required>
              </div>
            </div>
          </div>
          
          <div class="row">
              <div class="col-2">
                <div class="form-element"><label for="name">Institue</label>
                <input type="text" name="ins" placeholder="Type Your Institute" required autofocus></div>
              </div>
              <div class="col-2">
              <div class="form-element">
                <label for="name">Mobile no.</label>
                <input type="text" name="mob" placeholder="Type Your mobile no."  required>
              <input type="hidden" name="wrk" value="${user.name }" required>
              <input type="hidden" name="link" value="${user.link }" required>
             
              </div>
            </div>
          </div>
          
         
                <div class="row">
                    <div class="g-recaptcha" data-sitekey="6Lf6ZU8UAAAAAH4u9xtpiFM8KrDzLzt-Yvj6Ewas"></div>
                </div>

          <div class="row">
            <input type="submit" name="action" id="submit" onclick="showText()">
          </div>

        </form>

    </div>
  </section>
     
  </c:forEach>
    
  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-3">
          <ul>
            <li><a href="index">Coding Liquids</a></li>
            <li><a href="comingsoon">Portfolio</a></li>
            <li><a href="team">Team</a></li>
        </ul>
    </div>
    <div class="col-3">
        <ul>
            <li><a href="comingsoon">What We Do</a></li>
            <li><a href="events">Events</a></li>
            <li><a href="comingsoon">Careers</a></li>
          </ul>
        </div>
        <div class="col-3">
          <p>Address: Newtown, Kolkata-700157</p>
          <p>+91 8017742989</p>
            <div class="social">
                <div class="icon-wrapper"><a href=""> <img src="img/insta.svg" alt="Instagram Icon"></a> </div>
                <div class="icon-wrapper"><a href=""><img src="img/fb.svg" alt="Facebook Icon"></a></div>
                <div class="icon-wrapper"><a href=""><img src="img/twit.svg" alt="Twitter Icon"></a></div>
            </div>
        </div>
        <p>&copy; Coding Liquids 2018.</p>
      </div>
    </div>
  </footer>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/app.js"></script>
<script type="text/javascript">
    $(window).scroll(function(){
        var $wScroll = $(this).scrollTop();
        var $heroHeight = $(window).height();
        $heroHeight = $heroHeight - ($heroHeight/5);
        if(($wScroll > ($heroHeight - 20))) {
            $('.hamburger span, .hamburger .material-icons').css({"color": "#000"});
        }
        else{
            $('.hamburger span, .hamburger .material-icons').css({"color": "#fff"});
        }
        $('.hamburger .close').css({"color": "#fff"});
    });
</script>
</body>
</html>