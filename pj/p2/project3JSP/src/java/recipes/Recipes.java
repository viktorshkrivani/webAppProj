
package recipes;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author vikto
 */
public class Recipes extends HttpServlet {

   
    private static final ArrayList<Recipe> RECIPES = new ArrayList<>();

    
    static {
        
        ArrayList<Ingredient> pastaIngredients = new ArrayList<>();
        pastaIngredients.add(new Ingredient("Pasta", "Pounds", 1.0));
        pastaIngredients.add(new Ingredient("Tomato Sauce", "Cups", 2.0));
        pastaIngredients.add(new Ingredient("Ground Beef", "Pounds", 1.5));
        RECIPES.add(new Recipe("Pasta", pastaIngredients, "Cook pasta, add sauce and beef, and simmer for 15 minutes."));

        ArrayList<Ingredient> breadIngredients = new ArrayList<>();
        breadIngredients.add(new Ingredient("Flour", "Cups", 3.0));
        breadIngredients.add(new Ingredient("Yeast", "Teaspoons", 2.0));
        breadIngredients.add(new Ingredient("Water", "Cups", 1.5));
        breadIngredients.add(new Ingredient("Salt", "Teaspoons", 1.0));
        RECIPES.add(new Recipe("Bread", breadIngredients, "Mix ingredients, knead dough, let rise, and bake at 375 degrees for 30 minutes."));

        ArrayList<Ingredient> pizzaIngredients = new ArrayList<>();
        pizzaIngredients.add(new Ingredient("Pizza Dough", "Balls", 1.0));
        pizzaIngredients.add(new Ingredient("Tomato Sauce", "Cups", 1.5));
        pizzaIngredients.add(new Ingredient("Cheese", "Cups", 2.0));
        pizzaIngredients.add(new Ingredient("Pepperoni", "Slices", 20));
        RECIPES.add(new Recipe("Pizza", pizzaIngredients, "Spread sauce on dough, add cheese and toppings, and bake at 475 degrees for 12-15 minutes."));

        ArrayList<Ingredient> tacosIngredients = new ArrayList<>();
        tacosIngredients.add(new Ingredient("Taco Shells", "Pieces", 10));
        tacosIngredients.add(new Ingredient("Ground Beef", "Pounds", 1.0));
        tacosIngredients.add(new Ingredient("Cheese", "Cups", 1.0));
        tacosIngredients.add(new Ingredient("Lettuce", "Cups", 2.0));
        tacosIngredients.add(new Ingredient("Tomato", "Pieces", 2));
        RECIPES.add(new Recipe("Tacos", tacosIngredients, "Cook beef, fill shells with beef, cheese, lettuce, and tomato."));
    }
    
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        String recipeName = request.getParameter("recipe");
        Recipe selectedRecipe = null;

        //first recipe as default
        if (recipeName == null || recipeName.isEmpty()) {
            selectedRecipe = RECIPES.get(0);
        } else {
            for (Recipe recipe : RECIPES) {
                if (recipe.getName().equalsIgnoreCase(recipeName)) {
                    selectedRecipe = recipe;
                    break;
                }
            }
        }

        String factorStr = request.getParameter("factor");
        double factor = 1.0;
        if (factorStr != null) {
            try {
                factor = Double.parseDouble(factorStr);
            } catch (NumberFormatException e) {
                factor = 1.0;
            }
        }

        ArrayList<Ingredient> adjustedIngredients = new ArrayList<>();
        if (selectedRecipe != null) {
            for (Ingredient ingredient : selectedRecipe.getIngredients()) {
                adjustedIngredients.add(new Ingredient(
                        ingredient.getName(),
                        ingredient.getMeasure(),
                        ingredient.getQuantity() * factor));
            }
            selectedRecipe.setIngredients(adjustedIngredients);
        }

        
        request.setAttribute("recipe", selectedRecipe);
        
        String url = "/recipes.jsp";
        getServletContext().getRequestDispatcher(url).forward(request, response);
        }
    

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
