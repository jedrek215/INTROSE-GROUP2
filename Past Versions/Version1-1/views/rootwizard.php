  <!-- form wizard content ends -->
  <body>
                <script type="text/javascript">
                
                 var $validator = $("#artsForm").validate({
                errorClass: "my-error-class",
                ignore: [],
                rules: {
                    ActTitle: {
                        required: true
                    },
                    TieUp: {
                        required: true
                    },
                    datePicker1: {
                        required: false
                    },
                    datePicker2: {
                        required: false
                    },
                    ActTime: {
                        required: true
                    },
                    ActVenue: {
                        required: true
                    },
                    SubBy: {
                        required: true
                    },
                    ContactNum: {
                        required: true
                    },
                    SubBy: {
                        required: true,
                        email: true
                    },
                    Other: {
                        required: false
                    }
                }
                 }); 

                    $('#rootwizard').bootstrapWizard({
                          'tabClass': 'nav nav-pills',
                        onTabShow: function(tab, navigation, index) {
                            var $total = navigation.find('li').length;
                            var $current = index+1;
                            var $percent = ($current/$total) * 100;
                            $('#rootwizard').find('.bar').css({width:$percent+'%'});
                            
                            // If it's the last tab then hide the last button and show the finish instead
                            if($current >= $total) {
                                $('#rootwizard').find('.pager .next').hide();
                                $('#rootwizard').find('.pager .finish').show();
                                $('#rootwizard').find('.pager .finish').removeClass('disabled');
                            } else {
                                $('#rootwizard').find('.pager .next').show();
                                $('#rootwizard').find('.pager .finish').hide();
                            }
                          },
                        'onShow': function(tab, navigation, index) {
                            var $valid = $("#artsForm").valid();
                            if($valid)  {
                                 $validator.focusInvalid();
                                return true;
                            }
                        },
                        'onFinish': function(tab, navigation, index) {
                            var $valid = $("#artsForm").valid();
                            if(!$valid)  {
                                 $validator.focusInvalid();
                                return false;
                            }
                        },
                        onTabClick: function(tab, navigation, index) {
                        return false;
                        }

                    }); 


                </script>
</body>