                <div class="single-amenities">
                  <div class="amenities-thumb">
                    <img
                      class="img-fluid w-100"
                      src="<?php echo $row["postImg"] ?>"
                      alt=""
                    />
                  </div>
                  <div class="amenities-details">
                    <h5>
                      <a href="./blog-single-test.php?id=<?php echo $row["id"] ?>">
                        <?php
                          echo $row["postTitle"]; 
                        ?>
                      </a>
                    </h5>
                    <div class="amenities-meta mb-10">
                      <a href="#" class="">
                        <span class="ti-calendar"></span><?php echo $row["date"] ?>
                      </a>
                      <a href="#" class="ml-20">
                        <span class="ti-comment"></span>05
                      </a>
                    </div>
                    <p>
                      Creepeth green light appear let rule only you're divide
                      and lights moving and isn't given creeping deep.
                    </p>

                    <div class="d-flex justify-content-between mt-20">
                      <div>
                        <a href="#" class="blog-post-btn">
                          Read More <span class="ti-arrow-right"></span>
                        </a>
                      </div>
                      <div class="category">
                        <a href="#">
                          <span class="ti-folder mr-1"></span> <?php echo $row["category"] ?>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>