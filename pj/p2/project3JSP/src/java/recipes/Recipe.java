
package recipes;

import java.io.Serializable;
import java.util.ArrayList;

/**
 *
 * @author vikto
 */
public class Recipe implements Serializable{
    private String name;
    private ArrayList<Ingredient> ingredients;
    private String directions;

    public Recipe() {
        this.name = "";
        this.ingredients = new ArrayList<>(); 
        this.directions = "";
    }

    public Recipe(String name, ArrayList<Ingredient> ingredients, String directions) {
        this.name = name;
        this.ingredients = ingredients;
        this.directions = directions;
    }
    
    

    

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    

    public ArrayList<Ingredient> getIngredients() {
        return ingredients;
    }

    public void setIngredients(ArrayList<Ingredient> ingredients) {
        this.ingredients = ingredients;
    }

    public String getDirections() {
        return directions;
    }

    public void setDirections(String directions) {
        this.directions = directions;
    }
    
    
    
}
