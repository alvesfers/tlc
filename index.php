<?php include('header.php'); ?>
<div class="content" id="content">
    <h3>Dashboard - Geral</h3>
    <hr />
    <h5>Núcleos</h5>
    <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
        <div class="col">
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white" id="ver-todos-nucleos"><span>Todos os núcleos</span><i class="bx bx-low-vision"></i></div>
                <div class="card-body text-primary">
                    <h5 class="card-title text-center"><?php echo $qtd_nucleo['total_nucleos'] ?></h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-white" id="ver-nucleos-ativos"><span>Núcleos ativos</span><i class="bx bx-low-vision"></i></div>
                <div class="card-body text-success">
                    <h5 class="card-title text-center"><?php echo $qtd_nucleo['nucleos_ativos'] ?></h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-danger mb-3">
                <div class="card-header bg-danger text-white" id="ver-nucleos-inativos"><span>Núcleos inativos</span><i class="bx bx-low-vision"></i></div>
                <div class="card-body text-danger">
                    <h5 class="card-title text-center"><?php echo $qtd_nucleo['nucleos_inativos'] ?></h5>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <h5>Dirigentes</h5>
    <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
        <div class="col">
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white" id="ver-todos-dirigentes"><span>Todos os Dirigentes</span><i class="bx bx-low-vision"></i></div>
                <div class="card-body text-primary">
                    <h5 class="card-title text-center"><?php echo $qtd_dirigente['total_dirigentes'] ?></h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-white" id="ver-dirigentes-ativos"><span>Dirigentes ativos</span><i class="bx bx-low-vision"></i></div>
                <div class="card-body text-success">
                    <h5 class="card-title text-center"><?php echo $qtd_dirigente['dirigentes_ativos'] ?></h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-danger mb-3">
                <div class="card-header bg-danger text-white" id="ver-dirigentes-inativos"><span>Dirigentes inativos</span><i class="bx bx-low-vision"></i></div>
                <div class="card-body text-danger">
                    <h5 class="card-title text-center"><?php echo $qtd_dirigente['dirigentes_inativos'] ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php') ?>