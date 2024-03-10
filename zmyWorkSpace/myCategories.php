                <div class="single-sidebar-widget post-category-widget">
                  <h4 class="category-title">Catgories</h4>
                  <ul class="cat-list mt-20">
                    <?php 
                      while ($row = $categories_result->fetch_assoc()) {
                    ?>
                    <li>
                      <a href="?category=<?php echo $row["id"] ?>" class="d-flex justify-content-between">
                        <p><?php echo $row["category"] ?></p>
                        <!-- <p>59</p> -->
                      </a>
                    </li>
                    <?php
                    }
                    ?>
                  