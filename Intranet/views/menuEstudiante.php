<nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="./index.php" class="nav-link ">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Inicio
                </p>
              </a>
            </li>
           <?php
               $result = $studentService -> findyAll();
               while ($alumn = mysqli_fetch_array($result)) {
                    echo ('<li class="nav-item has-treeview">');
                    echo (' <a href="#" class="nav-link active">');
                    echo(' <i class="nav-icon ion-ios-book"></i> ');
                    echo('<p>');
                    echo $alumn['NOMBRE']; echo "<br>";
                    echo('<i class="right fas fa-angle-left"></i>'); 
                    echo('</p>');
                    echo('</a>');
                    ?>

                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="./subject.php" class="nav-link active">
                        <i class="far ion-ios-book-outline av-icon"></i>
                        <p>Anuncios</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="./homework.php" class="nav-link">
                        <i class="far ion-ios-book-outline av-icon"></i>
                        <p>Tareas</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../users/Student/Tarea.php" class="nav-link">
                        <i class="far ion-ios-book-outline av-icon"></i>
                        <p>Archivos</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../../index3.html" class="nav-link">
                        <i class="far ion-ios-book-outline av-icon"></i>
                        <p>Tutor</p>
                      </a>
                    </li>
			      </ul>
           <?php
               }
           ?>


            
            
        </nav>
