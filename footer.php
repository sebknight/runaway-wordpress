            </div>
            <!-- columns END -->
        </section> 
        <!-- Section ENDS -->
        <footer>
            <div class="level">
                <div class="level-item">
                <?php 
                    if( get_theme_mod( 'footer_text_block') !=""){
                        echo get_theme_mod( 'footer_text_block' );
                    }
                    else {
                        echo '© Runaway NZ 2019';
                    }
                    wp_nav_menu(array('theme_location' => 'secondary')) 
                ?>
                
                </div>
            </div>         
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>