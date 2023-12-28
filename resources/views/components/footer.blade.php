<?php 
$filePath = base_path('resources/utils/brands.util.json');
$jsonString = file_get_contents($filePath);
$array = json_decode($jsonString, true);
?>
<footer class="bg-black flex flex-col justify-center items-center text-white">
    <section class="flex flex-col justify-center items-center p-5 space-y-5">
        <div class="space-y-5">
            <h1 class="font-3 text-xl text-center uppercase">Nhà tài trợ vàng</h1>
            <ul class="grid xl:grid-cols-6 lg:grid-cols-4 grid-cols-2 gap-5">
                <?php 
                 foreach ($array['brands'] as $brand) {
                    echo '
                    <li>
                        <div>
                            <img class="w-full h-12 rounded object-cover" src="'.asset($brand['logo']).'" alt="'.$brand['name'].'">    
                        </div> 
                        <h1>'.$brand['name'].'</h1>
                    </li>
                    ';
                 }    
                ?>
            </ul>
        </div>
        <div>
            <!-- Additional Footer Information -->
            <p>&copy; 2023 Your Website. All rights reserved.</p>
        </div>
    </section>
</footer>