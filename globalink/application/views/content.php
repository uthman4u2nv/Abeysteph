 <div class="row">
      <div class="col-sm-6">
      <div style="padding-left:40px; padding-top:40px; padding-bottom: 40px; margin-top:0px; text-align: justify;">
          <?
          if(!empty($content)){
          foreach($content as $details){}
          ?>
          <div style="padding: 5px; border-bottom: 1px solid; margin-bottom: 10px;">
          <strong><?=html_entity_decode(strtoupper($details['page_ref_title']))?></strong>
          </div>
         
      <?=html_entity_decode(stripslashes($details['page_ref_content']));?>
      <? }
      
      else{
      echo "<pre><span>No, result found.<br>The page you are looking for has either been moved or changed</span></pre>";
      }
       ?>
      </div>
      </div>
      <div class="col-sm-6">
      <div style="padding:40px; margin:40px; border:1px solid;">
       <div style="border-bottom:1px solid; margin-bottom:20px;">
      QUICK LINKS
      </div>
      <div style="margin-top:20px;">        
          <form role="form">
  
  <div class="form-group">
  <select name="links" class="form-control">
  <option value="" selected="selected">Quick Links</option>
  <option value="1">Form Downloads</option>
  <option value="2">Unity Bank Savings Promo</option>
  <option value="3">Financials</option>
  <option value="1">Board of Directors</option>
  <option value="1">Feed Back</option>
  </select><br />
  
  <select name="links" class="form-control">
  <option value="" selected="selected">Client Login</option>
  <option value="1">Internet Banking</option>
  <option value="2">Nigerian Army</option>
  <option value="3">Unity Job Site</option>
  <option value="1">Vendors Login</option>

  </select><br />
  <select name="links" class="form-control">
  <option value="" selected="selected">ATM & Branch Locator</option>
  <option value="1">ATM Locator</option>
  <option value="2">Branch Locator</option>
   </select>
    
  </div>
              
  

</form>
          </div>

     
      </div>
      <div style="padding:40px; margin:40px; border:1px solid;">
       <div style="border-bottom:1px solid; margin-bottom:20px;">
      SUBSCRIBE FOR NEWSLETTER
      </div>
      <div style="margin-top:20px;">        
          <form role="form">
  
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
              
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
          </div>

     
      </div>
      </div>
      </div>
   