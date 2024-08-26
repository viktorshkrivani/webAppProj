
package recipes;

import java.io.Serializable;

/**
 *
 * @author vikto
 */
public class Ingredient implements Serializable {
    private String name;
    private String measure;
    private double quantity;
   

    public Ingredient() {
        this.name = "";
        this.measure = "";
        this.quantity = 0.0;
    }

    public Ingredient(String name, String measure, double quantity) {
        this.name = name;
        this.measure = measure;
        this.quantity = quantity;
    }
    
    

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getMeasure() {
        return measure;
    }

    public void setMeasure(String measure) {
        this.measure = measure;
    }

    public double getQuantity() {
        return quantity;
    }

    public void setQuantity(double quantity) {
        this.quantity = quantity;
    }
    
    
    
}
