        </div>
    </div>
    
    
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

            $('#time').timepicker({ 
                'timeFormat': 'H:mm:ss', 
                'interval': '15', 
                'minTime': '09', 
                'maxTime': '22:00',
                'startTime': '09:00', 
                'dynamic': 'false', 
                'dropdown': 'true', 
                'scrollbar': 'true'
            });
            
        });
    </script>
    <script language="javascript" type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script language="javascript" type="text/javascript" src="./public/js/admin.js"></script>
    <script language="javascript" type="text/javascript" src="./public/js/adminphim1.js"></script>
    <script language="javascript" type="text/javascript" src="./public/js/adminsuatchieu1.js"></script>
    <script language="javascript" type="text/javascript" src="./public/js/adminhoadon1.js"></script>
    <script language="javascript" type="text/javascript" src="./public/js/admintaosuatchieu.js"></script>
    <script language="javascript" type="text/javascript" src="./public/js/adminphanquyen1.js"></script>
    <script language="javascript" type="text/javascript" src="./public/js/adminthongkehoadon2.js"></script>
    <script language="javascript" type="text/javascript" src="./public/js/adminthongkesuatchieu3.js"></script>
</body>

</html> 
