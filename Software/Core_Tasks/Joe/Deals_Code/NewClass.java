/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication6;

import java.util.Scanner;

/**
 *
 * @author Joe
 */
public class NewClass {
    
    public static void main(String[] args){
        
        Scanner input = new Scanner(System.in);
        
        
        System.out.println("Please enter the number of apples: ");
        System.out.print("=> ");
        int x = input.nextInt();
        
        if ((x % 3 != 0) && (x > 3)){
            
           
            double stage1 = x / 3; //Get the difference
            int bla = (int) stage1; // Change to integer
            int stage2 = bla * 3; //Multiply to get actual 3 value
            double lastone = deals(stage2);
            
            double stage3 = x - bla;
            double new2 = bla * 1.50;
            double total = lastone + new2;
            System.out.println();
            System.out.println("Your total price is " + total);
            
            
        }else if(x % 3 == 0){
            double total = deals(x);
            System.out.println();
            System.out.println("Your total price is: " + total);
            
        }
        else{
            double total = x * 1.50;
            System.out.println();
            System.out.println("Your total price is: " + total);
        }
       
    }
    
    public static double deals(int x){
        if (x % 3 == 0){
            double total = x * 1.50;
            double discount = total * 0.33;
            total = total - discount;
            return total;
            
        }
        else { return 0;}
    }}
    
    
    
    
    

