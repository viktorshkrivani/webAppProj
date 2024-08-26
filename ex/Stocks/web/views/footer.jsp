<%-- 
    Document   : footer
    Created on : Jul 16, 2024, 3:36:19 PM
    Author     : vikto
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=UTF-8">
        <title>Stocks</title>
    </head>
    <body>
        <%@ page import="java.util.GregorianCalendar, java.util.Calendar" %>

        <%
            GregorianCalendar currentDate = new GregorianCalendar();
            int currentYear = currentDate.get(Calendar.YEAR);
        %>

        <footer>
            <p>
                &copy; <%= currentYear%> My Awesome Stocks site
            </p>
        </footer>
    </body>
</html>
