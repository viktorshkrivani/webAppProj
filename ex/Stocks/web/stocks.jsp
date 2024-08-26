<%-- 
    Document   : stocks
    Created on : Jul 16, 2024, 3:08:31 PM
    Author     : vikto
--%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>

<%@ page import="stocks.Stock" %>

<c:import url='views/header.jsp'/>

    
<%
    Stock stockAttribute = (Stock)request.getAttribute("stock");
    if (stockAttribute == null) {
        stockAttribute = new Stock();
    }
    %>

<h2>Stocks?!</h2>

<table>
    <tr>
        <th>Symbol</th>
        <th>Name</th>
        <th>Current Price</th>
        <th>Purchase Price</th>
        <th>Value</th>
    </tr>
<!--
    <tr>
        <%-- JSP Expression Language syntax --%>
        <td>${stock.symbol}</td>
        <td>${stock.name}</td>
        <td>${stock.currentPrice}</td>   
        <td>${stock.purchasePrice}</td> 
        <td>${stock.value}</td> 
    </tr>
    <tr>
        <%-- Manual suntax + see code above --%>
        <td><%= stockAttribute.getSymbol() %></td>
        <td><%= stockAttribute.getName() %></td>
        <td><%= stockAttribute.getCurrentPrice() %></td> 
        <td><%= stockAttribute.getPurchasePrice() %></td>   
        <td><%= stockAttribute.getValue() %></td>   
    </tr>
    <tr> 
         comment -->
        <%-- JSP tag syntax --%>
        <jsp:useBean id="stock" scope="request" class="stocks.Stock" />
        <td><jsp:getProperty name= "stock" property="symbol" /></td>
        <td><jsp:getProperty name= "stock" property="name" /></td>
        <td>$<jsp:getProperty name= "stock" property="currentPrice" /></td>   
        <td>$<jsp:getProperty name= "stock" property="purchasePrice" /></td> 
        <td>$<jsp:getProperty name= "stock" property="value" /></td> 
    </tr>
    
    <!-- 
    <c:forEach var="stockInList" items="${stocks}">
    <tr>
        <%-- JSP Expression Language syntax --%>
        <td>${stockInList.symbol}</td>
        <td>${stockInList.name}</td>
        <td>${stockInList.currentPrice}</td>   
        <td>${stockInList.purchasePrice}</td> 
        <td>${stockInList.value}</td> 
    </tr>
    </c:forEach>
      comment -->
    
</table>
        
<c:import url='views/footer.jsp'/>
  

