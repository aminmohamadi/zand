      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 footer-copyright">
              <p class="mb-0">کپی رایت © {{ date('Y') }}  تمام حقوق محفوظ است.</p>
            </div>
          </div>
        </div>
      </footer>

      <div class="modal fade" id="deleteItem" data-backdrop="static" tabindex="-1" role="dialog"
           aria-labelledby="deleteItem" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h2 class="modal-title">اخطار</h2>
                  </div>
                  <div class="modal-body d-flex align-items-center">
                      <div class="row text-left" style="display: contents">
                          <div class="modal-icon text-warning mr-5 ml-2" style="font-size: 60px">
                              <i class="fa fa-warning"></i>
                          </div>
                          <div class="modal-text ml-3">
                              <h4>اخطار</h4>
                              <p>آیا از انجام عملیات اطمینان دارید؟</p>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <div class="row">
                          <div class="col-md-12 text-right">
                              <button class="btn btn-danger modal-confirm" id="modal-confirm" type="submit">بله</button>
                              <button class="btn btn-info" data-dismiss="modal">خیر</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
