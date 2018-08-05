 <!-- Start Footer -->
        <footer>
            <div class="container">
                <div class="row footer-widgets">

                    <!-- Start Contact Widget -->
                    <div class="col-md-12">
                        <div class="footer-widget contact-widget">
                            <h2><font color=#0aa05c>SEKOLAH DASAR AL FIRDAUS</font></h2>
                            <H4>MENCERDASKAN TANPA DISKRIMINASI</h4>
                            <ul>
                                <li><span>Alamat :</span> Jl. Yosodipuro No. 56 Solo 57132 Jawa Tengah</li>
                                <li><span>email :</span> sd.alfi@alfirdausina.net</li>
                                <li><span>Telepon :</span> (0271) 716429; 739303</li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Contact Widget -->
                </div>

                <!-- Start Copyright -->
                <div class="copyright-section">
                    <div class="row">
                        <div class="col-md-6">
                            <p>© 2015 Support by Team KMM UNS</p>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-nav">
                                <li><a href="<?= base_url() ?>">Beranda</a></li>
                                <li><a href="galeri.html">Galeri</a></li>
                                <li><a href="500.html">Program</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Copyright -->

            </div>
        </footer>
        <!-- End Footer -->


    </div>
    <!-- End Full Body Container -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>

    <!-- Style Switcher -->
    <div class="switcher-box">
        <a href="#" class="open-switcher show-switcher"><i class="fa fa-cog fa-2x"></i></a>
        <h4>Style Switcher</h4>
        <span>12 Predefined Color Skins</span>
        <ul class="colors-list">
            <li>
                <a onClick="setActiveStyleSheet('blue'); return false;" title="Blue" class="blue"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('sky-blue'); return false;" title="Sky Blue" class="sky-blue"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('cyan'); return false;" title="Cyan" class="cyan"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('jade'); return false;" title="Jade" class="jade"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('green'); return false;" title="Green" class="green"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('purple'); return false;" title="Purple" class="purple"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('pink'); return false;" title="Pink" class="pink"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('red'); return false;" title="Red" class="red"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('orange'); return false;" title="Orange" class="orange"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('yellow'); return false;" title="Yellow" class="yellow"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('peach'); return false;" title="Peach" class="peach"></a>
            </li>
            <li>
                <a onClick="setActiveStyleSheet('beige'); return false;" title="Biege" class="beige"></a>
            </li>
        </ul>
        <span>Top Bar Color</span>
        <select id="topbar-style" class="topbar-style">
            <option value="1">Light (Default)</option>
            <option value="2">Dark</option>
            <option value="3">Color</option>
        </select>
        <span>Layout Style</span>
        <select id="layout-style" class="layout-style">
            <option value="1">Wide</option>
            <option value="2">Boxed</option>
        </select>
        <span>Patterns for Boxed Version</span>
        <ul class="bg-list">
            <li>
                <a href="#" class="bg1"></a>
            </li>
            <li>
                <a href="#" class="bg2"></a>
            </li>
            <li>
                <a href="#" class="bg3"></a>
            </li>
            <li>
                <a href="#" class="bg4"></a>
            </li>
            <li>
                <a href="#" class="bg5"></a>
            </li>
            <li>
                <a href="#" class="bg6"></a>
            </li>
            <li>
                <a href="#" class="bg7"></a>
            </li>
            <li>
                <a href="#" class="bg8"></a>
            </li>
            <li>
                <a href="#" class="bg9"></a>
            </li>
            <li>
                <a href="#" class="bg10"></a>
            </li>
            <li>
                <a href="#" class="bg11"></a>
            </li>
            <li>
                <a href="#" class="bg12"></a>
            </li>
            <li>
                <a href="#" class="bg13"></a>
            </li>
            <li>
                <a href="#" class="bg14"></a>
            </li>
        </ul>
    </div>

    <!-- DATA TABES SCRIPT -->
    <script src="<?=base_url('assets/template/AdminLTE/plugins/datatables/jquery.dataTables.min.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/template/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js');?>" type="text/javascript"></script>

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

</body>

</html>
