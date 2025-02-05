
package stocks;

import java.io.Serializable;




public class Stock implements Serializable {
    private String symbol;
    private String name;
    private double purchasePrice;
    private double currentPrice;

    public Stock() {
        symbol = "";
        name = "";
        purchasePrice = 0;
        currentPrice = 0;
    }

    public Stock(String symbol, String name, double currentPrice, double purchasePrice) {
        this.symbol = symbol;
        this.name = name;
        this.currentPrice = currentPrice;
        this.purchasePrice = purchasePrice;
    }
    
    public double getValue(){
        return currentPrice - purchasePrice;
    }

    public double getPurchasePrice() {
        return purchasePrice;
    }

    public void setPurchasePrice(double purchasePrice) {
        this.purchasePrice = purchasePrice;
    }

    
    
    
    public String getSymbol() {
        return symbol;
    }

    public void setSymbol(String symbol) {
        this.symbol = symbol;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public double getCurrentPrice() {
        return currentPrice;
    }

    public void setCurrentPrice(double currentPrice) {
        this.currentPrice = currentPrice;
    }
    
    
    
}
