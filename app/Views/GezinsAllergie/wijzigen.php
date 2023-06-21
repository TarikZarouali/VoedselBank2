 <form action="<?php echo URLROOT; ?>/GezinsAllergie/wijzigen" method="POST">
     <label for="allergy">Select Allergy:</label>
     <select name="allergy" id="allergy">
         <option value="Gluten">Gluten</option>
         <option value="Peanut">Peanut</option>
         <option value="Schaaldieren">Schaaldieren</option>
         <option value="Hazelnoten">Hazelnoten</option>
         <option value="Lactose">Lactose</option>
         <option value="Soja">Soja</option>
         <option value="all">Show All</option>
     </select>
     <button type="submit">Filter</button>
 </form>