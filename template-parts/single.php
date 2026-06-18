 <main class="relative pb-80 pc:pb-160">

   <div id="information" class="content_wrapper lower">
     <div class="c-width --sub">
       <div class="main_cont">
         <div class="content_inner">

           <div class="content_section">
             <div class="content_title">
               <h2><span>INFORMATION</span></h2>
             </div>
           </div>

           <div class="content_section">
             <div class="single_date-cat">
               <p class="single_date"><?php echo get_the_date('Y.m.d'); ?></p>
               <!--<p class="single_cat">Hair</p>-->
             </div>
             <h1 class="single_ttl"><?php echo get_the_title(); ?></h1>
             <div class="single_txt"><?php the_content(); ?></div>
           </div>



         </div>

       </div>
     </div>
   </div>

 </main>