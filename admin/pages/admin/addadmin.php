<div class="button-add-student">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Them</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Them Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="admin/newadmin.php" enctype="multipart/form-data">
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="recipient-name" name="email">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">username:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="username">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">password:</label>
                                    <input type="password" class="form-control" id="recipient-name" name="password">
                                  </div>
                                  <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Them</button>
                              </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>