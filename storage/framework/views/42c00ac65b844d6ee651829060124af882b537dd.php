<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />

   <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
       <title>My Note</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style type="text/css">
  
</style>

</head>
<body>
     <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <i class="fas fa-tasks"></i>&nbsp;&nbsp;My Note
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?php echo e(url('/home')); ?>"class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(url('/home/history')); ?>"class="nav-link">My History</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(url('home/kalender')); ?>"class="nav-link">Calendar</a>
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                    
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
     

     <div class="container-fluid">
       
  <div id='wrap' class="py-3">

    <div id='external-events'>
      <h4>Events</h4><?php $i=1; ?>
      <?php $__currentLoopData = $calendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row py-1">
        <div class="col-md-3">
      <div id='external-events-list'>
        
        <div class='fc-event'><?php echo e($i++); ?> . <?php echo e($cal->title); ?></div>
        
        </div>
      </div>
      </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
      
    </div>

    <div id='calendar'></div>

    <div style='clear:both'></div>

  </div>
     </div>


     <div class="modal" tabindex="-1" role="dialog"id="insertModalTask">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Insert New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/create"method="get"id="formInsert"class="form-group">
        <?php echo e(csrf_field()); ?>

        <div class="modal-body">
            Activity : 
            <input type="text" name="taskName"required class="form-control">

            <input type="hidden" name="start"id="input2"value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"id="click">submit</button>
        </div>
      </form>
    </div>
  </div>
</div>  
  <script>
    $(document).ready(function () {
    $.ajaxSetup({        
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                
                    }
                })
  
  var SITEURL = "<?php echo e(url('/')); ?>";
 var calendar = $('#calendar').fullCalendar({
          editable: true,
          events: "<?php echo e(route('routeLoadEvents')); ?>",
          displayEventTime: true,
          editable: true,
          eventRender: function (event, element, view) {
              if (event.allDay === 'true') {
                  event.allDay = true;
              } else {
                  event.allDay = false;
              }
            },
            selectable: true,
          selectHelper: true,
      select: function (event) {
            var full = $.fullCalendar.formatDate(event,"Y-MM-DD")+' '+('<?php echo e(date("H:i:s")); ?>')
            $('#input2').val(full)

            $('#insertModalTask').modal('show')
            
                $('#click').click(function () {
                  $('#click').attr('disabled',true)
                  $.ajax({
                url:'/home/create',
              data :$('#formInsert').serialize(),
              type:'GET',
              success:function (data) {
                if (data == true) {
                  
                  $('#insertModalTask').modal('hide')
                  window.location.reload()
                }
                
                
                }
              })    
            })

              calendar.fullCalendar('unselect');
            },
      eventDrop: function (event) {
          change = $.fullCalendar.formatDate(event.start,"Y-MM-DD")+' '+('<?php echo e(date("H:i:s")); ?>')
          $.ajax({
            url:'/home/ChangeDate',
            data :'start='+change+'&id='+event.id,
            type:'GET',
            success:function () {
              alert('success change date')
            }
          })
        }
      })
    })
  </script>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\OneToMany\resources\views/fullcalendar/calendar.blade.php ENDPATH**/ ?>