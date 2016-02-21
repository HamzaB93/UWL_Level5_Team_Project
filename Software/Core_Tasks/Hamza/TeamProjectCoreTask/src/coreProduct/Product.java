/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package coreProduct;

public class Product {

    // Properties
    String prodName;
    String prodBrand;
    String prodDescription;
    double prodPrice;
    
    // Constructors
    // Default
    public Product()
    {
        prodName = "Unknown Product Name";
        prodBrand = "Unknown Product Brand";
        prodDescription = "Unknown Product Description";
        prodPrice = 0.00;
    }
    
    // Parameterised
    public Product(String prodName, String prodBrand, String prodDescription, double prodPrice)
    {
        this.prodName = prodName;
        this.prodBrand = prodBrand;
        this.prodDescription = prodDescription;
        this.prodPrice = prodPrice;
    }
    
    // Getters
    public String getProdName() {
        return prodName;
    }
    
    public String getProdBrand() {
        return prodBrand;
    }
    
    public String getProdDescription() {
        return prodDescription;
    }

    public double getProdPrice() {
        return prodPrice;
    }
    
    // Setters
    public void setProdName(String prodName) {
        this.prodName = prodName;
    }

    public void setProdBrand(String prodBrand) {
        this.prodBrand = prodBrand;
    }
    public void setProdDescription(String prodDescription) {
        this.prodDescription = prodDescription;
    }
    
    public void setProdPrice(double prodPrice) {
        this.prodPrice = prodPrice;
    }
    
    // toString
    public String toString()
    {
        return ("Product Name: " + prodName + ", Product Brand: " + prodBrand
                + ", Product Description: " + prodDescription 
                + ", Product Price: " + prodPrice);
    }
                
}
