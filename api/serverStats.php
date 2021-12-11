<?php
echo disk_free_space("/") * 0.000001;
echo "</br>";
echo disk_total_space("/") * 0.000001;
echo "</br>";
echo disk_free_space("/") / disk_total_space("/");
