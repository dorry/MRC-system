<?php  
  
interface IReserve { 
   public  function makeReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad); 
   public  function editReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad); 
   public  function showReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad); 
   public  function deleteReservation(doctor $dr,patient $pat,DateTime $appointment,radiology $rad); 


}  
  
?> 