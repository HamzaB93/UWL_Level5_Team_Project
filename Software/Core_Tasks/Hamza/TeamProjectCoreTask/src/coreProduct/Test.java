package coreProduct;

public class Test {

    public static void main(String[] args) {

        Product bread = new Product();
        
        System.out.println(bread.toString());
        
        bread.setProdName("Brown bread");
        bread.setProdBrand("Hovis");
        bread.setProdDescription("Brown bread with crust");
        bread.setProdPrice(1.00);
        
        System.out.println(bread.toString());
    }  
}
