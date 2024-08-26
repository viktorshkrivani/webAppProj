<%-- 
    Document   : recipe
    Created on : Jul 17, 2024, 4:00:37 PM
    Author     : vikto
--%>

<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ page import="recipes.Recipe" %>
<%@ page import="recipes.Ingredient" %>

<jsp:useBean id="recipe" scope="request" class="recipes.Recipe" />
<jsp:useBean id="ingredient" class="recipes.Ingredient" />

<h1>Adjusted Recipe</h1>
<c:if test="${not empty recipe.ingredients}">
    <table border="1">
        <tr>
            <th>Ingredient</th>
            <th>Measure</th>
            <th>Quantity</th>
        </tr>
        <c:forEach var="ingredient" items="${recipe.ingredients}">
            <tr>
                <td><jsp:getProperty name="ingredient" property="name" /></td>
                <td><jsp:getProperty name="ingredient" property="measure" /></td>
                <td><jsp:getProperty name="ingredient" property="quantity" /></td>
            </tr>
        </c:forEach>
    </table>
    <h2>Directions</h2>
    <p><jsp:getProperty name="recipe" property="directions" /></p>
</c:if>