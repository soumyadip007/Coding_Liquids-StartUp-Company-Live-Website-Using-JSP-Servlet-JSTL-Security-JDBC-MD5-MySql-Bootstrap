package user;

import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class add
 */
@WebServlet("/add")
public class add extends HttpServlet {
	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
	// TODO Auto-generated method stub
		
		String name=request.getParameter("name");
		String start=request.getParameter("email");
		String end=request.getParameter("yr");
		String venue=request.getParameter("dep");
		String des=request.getParameter("ins");
		String venue1=request.getParameter("mob");
		String des1=request.getParameter("wrk");
		String link=request.getParameter("link");
		try {
		
		
		Class.forName("com.mysql.jdbc.Driver");
		
		ServletContext ct=getServletContext();
		
		Connection con=(Connection) DriverManager.getConnection(ct.getInitParameter("path"),ct.getInitParameter("user"),ct.getInitParameter("pass"));
		
	//	Connection con=(Connection) DriverManager.getConnection("jdbc:mysql://node12654-getsaved.cloudjiffy.net/hackathon","root","THHrio35634");
		
		PreparedStatement st=con.prepareStatement("INSERT INTO user(name,email,yr,dep,ins,mob,wrk) values(?,?,?,?,?,?,?)");
		
			st.setString(1,name);
			st.setString(2,start);
			st.setString(3,end);
			st.setString(4,venue);
			st.setString(5,des);
			st.setString(6,venue1);
			st.setString(7,des1);
			
		
			int i=st.executeUpdate();
		
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	
		
		
		
		
		response.getWriter().append("Served at: ").append(request.getContextPath());
		//response.sendRedirect("https://www.latlong.net/c/?lat="+latt+"&long="+longi);
	//	https://www.google.co.in/maps/@22.5601086,88.4904909,21z

		response.sendRedirect(link);
	}

}
