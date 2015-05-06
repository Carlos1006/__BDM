<!DOCTYPE HTML>
<html>
    <head>
        <title>Profile</title>
        <?php 
                session_start();
                include $_SESSION['raiz']."/__BDM/resources/php/include.php"; 
                include $_SESSION['raiz']."/__BDM/model/Venta.php";
                include $_SESSION['raiz']."/__BDM/model/Aviso.php";
                include $_SESSION['raiz']."/__BDM/model/Usuario.php";
                include $_SESSION['raiz']."/__BDM/model/MetodoPago.php";
                include $_SESSION['raiz']."/__BDM/model/Pregunta.php";
                include $_SESSION['raiz']."/__BDM/model/Producto.php";
        ?>
        <script src="/__BDM/resources/js/profile.js"></script>
        <script src="/__BDM/resources/js/actions/profile_actions.js"></script>
        <script src="/__BDM/resources/js/validator/profile_validator.js"></script>
    </head>
    <body>
        <?php include $_SESSION['raiz']."/__BDM/resources/php/header.php"; ?>
        <div class="superContainer">
            <div class="leftSkyscraper">
                <?php include $_SESSION['raiz']."/__BDM/resources/php/categories.php"; ?>
            </div>
            <div class="centerSkyscraper">
                <div class="superProfile">
                    <div class="headerProfile">
                        <div class="profileHeader headerAds"      check="true" for="profileAds"       > Avisos      </div>
                        <div class="profileHeader headerProducts" check="false" for="profileProducts"  > Productos   </div>
                        <div class="profileHeader headerQuestion" check="false" for="profileQuestions" > Preguntas   </div>
                        <div class="profileHeader headerExtra1"   check="false" for="profileRequests"  > Solicitudes </div>
                        <div class="profileHeader headerExtra2"   check="false" for="profileSales"     > Ventas      </div>
                        <div class="profileHeader headerUploadProduct"      check="false"  for="profileUpload_Product" style="display:none"></div>
                        <div class="profileHeader headerUploadAd"           check="false"  for="profileUpload_Ad"      style="display:none"></div>
                    </div>
                    <div class="profileContainer">
                        <!--Pagina 1-->
                        <div class="profileAds">
                            <div class="filterContainer">
                                <input type="text" id="filterAds" class="filter form-control" placeholder="Filtra tus avisos...">
                                <div class="createAd" id="newAd">Crea un nuevo aviso</div>
                            </div>
                            <div class="profileAdHeader">
                                <div class="imageProfileAdHeader">          Imagen      </div>
                                <div class="descriptionProfileAdHeader">    Aviso       </div>
                                <div class="priceProfileAdHeader">          Precio      </div>
                                <div class="dateProfileAdHeader">           Vigencia    </div>
                                <div class="actionsProfileAdHeader">        Acciones    </div>
                            </div>
                            <div class="profileAdContainer">
                                <?php
                                    $avisos = null;
                                    if(isset($_SESSION["misAvisos"])) {
                                        $avisos = unserialize($_SESSION["misAvisos"]);
                                        if(count($avisos) > 0) {
                                            foreach($avisos as $aviso) {
                                                if(file_exists ( $_SESSION['raiz'].$aviso->getPathThumbnail() )) {
                                                    $url = $aviso->getPathThumbnail();
                                                } else {
                                                    $url = "/__BDM/img/404/dino.png";
                                                }
                                ?>
                                                <div class="profileAd" idAviso="<?php echo $aviso->getIdAviso(); ?>">
                                                    <div class="profileImageAd">
                                                        <img class="profileImageAdSrc" src="<?php echo $url; ?>"/>
                                                    </div>
                                                    <div class="profileDescriptionAd"><?php echo $aviso->getDescripcionAviso(); ?></div>
                                                    <div class="profilePriceAd"><?php echo $aviso->getPrecioAviso(); ?></div>
                                                    <div class="profileDateAd"><?php echo $aviso->getFechaAviso(); ?></div>
                                                    <div class="profileActionAd">
                                                        <div class="viewAction">
                                                            <img class="viewImg viewAdBtn" verAviso="<?php echo $aviso->getIdAviso(); ?>" src="/__BDM/img/icons/view-128.png">
                                                        </div>
                                                        <div class="editAction">
                                                            <img class="editImg editAdBtn" editaAviso="<?php echo $aviso->getIdAviso(); ?>"  src="/__BDM/img/icons/editAd.png">
                                                        </div>
                                                        <div class="deleteAction deleteAdBtn">
                                                            <img class="deleteImg" borraAviso="<?php echo $aviso->getIdAviso(); ?>" src="/__BDM/img/icons/deleteAdd.png">
                                                        </div>
                                                    </div>
                                                </div>
                                <?php
                                            }
                                        } else {
                                ?>
                                            <div class='noResultAd'>Sin avisos</div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <!--Pagina 2-->
                        <div class="profileProducts">
                            <div class="filterContainer">
                                <input type="text" id="filterProducts" class="filter form-control" placeholder="Filtra tus productos...">
                                <div class="createAd" id="newProduct">Crea un nuevo producto</div>
                            </div>
                            <div class="profileProductHeader">
                                <div class="imageProfileProductHeader">     Imagen      </div>
                                <div class="nameProfileProductHeader">      Producto    </div>
                                <div class="stockProfileProductHeader">     Existencia  </div>
                                <div class="dateProfileProductHeader">      Vigencia    </div>
                                <div class="actionsProfileProductHeader">   Acciones    </div>
                            </div>
                            <div class="profileProductContainer">
                                <?php
                                    $productos = null;
                                    if(isset($_SESSION["misProductos"])) {
                                        $productos = unserialize($_SESSION["misProductos"]);
                                        if(count($productos) > 0) {
                                            foreach($productos as $producto) {
                                                if(file_exists ( $_SESSION['raiz'].$producto->getPathThumbnail() )) {
                                                    $url = $producto->getPathThumbnail();
                                                } else {
                                                    $url = "/__BDM/img/404/dino.png";
                                                }
                                ?>
                                                <div class="profileProduct" idProducto="<?php echo $producto->getIdProducto(); ?>">
                                                    <div class="profileImageProduct">
                                                        <img class="profileImageProductSrc" src="<?php echo $url; ?>"/>
                                                    </div>
                                                    <div class="profileNameProduct"><?php echo $producto->getNombreProducto(); ?></div>
                                                    <div class="profileStockProduct"><?php echo $producto->getExistenciaProducto(); ?></div>
                                                    <div class="profileDateProduct"><?php echo $producto->getVigenciaProducto(); ?></div>
                                                    <div class="profileActionProduct">
                                                        <div class="viewAction">
                                                            <img class="viewImg viewProductBtn" verProducto="<?php echo $producto->getIdProducto(); ?>" src="/__BDM/img/icons/view-128.png">
                                                        </div>
                                                        <div class="editAction">
                                                            <img class="editImg editProductBtn" editaProducto="<?php echo $producto->getIdProducto(); ?>" src="/__BDM/img/icons/editAd.png">
                                                        </div>
                                                        <div class="deleteAction">
                                                            <img class="deleteImg deleteProductBtn" borraProducto="<?php echo $producto->getIdProducto(); ?>" src="/__BDM/img/icons/deleteAdd.png">
                                                        </div>
                                                    </div>
                                                </div>
                                <?php
                                            }
                                        } else {
                                ?>
                                            <div class='noResultAd'>Sin productos</div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <!--Pagina 3-->
                        <div class="profileQuestions">
                            <div class="profileQuestionHeader">
                                <div class="userProfileQuestionHeader">         Usuario     </div>
                                <div class="descriptionProfileQuestionHeader">  Pregunta    </div>
                                <div class="adProfileQuestionHeader">           Aviso       </div>
                                <div class="answerProfileQuestionHeader">       Contesta    </div>
                            </div>
                            <div class="profileQuestionContainer">
                                <?php
                                    if($_SESSION["misPreguntas"]) {
                                        $preguntas = unserialize($_SESSION["misPreguntas"]);
                                        if(count($preguntas) > 0) {
                                            foreach($preguntas as $pregunta) {
                                ?>
                                                <div class="profileQuestion" idPregunta="<?php echo $pregunta->getIdPregunta(); ?>">
                                                    <div class="profileQuestionUser"><?php echo $pregunta->getUsuarioPregunta(); ?></div>
                                                    <div class="profileQuestionDescription"><?php echo $pregunta->getDescripcionPregunta(); ?></div>
                                                    <div class="profileQuestionAd"><?php echo $pregunta->getAvisoPregunta(); ?></div>
                                                    <div class="profileQuestionAnswer">
                                                        <input class="profileQuestionAnswerInput form-control" placeholder="Escribe tu respuesta..."/>
                                                        <div idPregunta="<?php echo $pregunta->getIdPregunta(); ?>" class="answerButton">Responde</div>
                                                    </div>
                                                </div>
                                <?php
                                            }
                                        }else {
                                ?>
                                            <div class='noResultAd'>Sin preguntas</div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <!--Pagina 4-->
                        <div class="profileRequests">
                            <div class="profileRequestHeader">
                                <div class="userProfileRequestHeader">       Usuario         </div>
                                <div class="adProfileRequestHeader">         Aviso           </div>
                                <div class="quantityProfileRequestHeader">   Cantidad        </div>
                                <div class="payProfileRequestHeader">        Metodo de pago  </div>
                                <div class="confirmProfileRequestHeader">    Confirma        </div>
                            </div>
                            <div class="profileRequestContainer">
                                <?php
                                    if(isset($_SESSION["misSolicitudes"])) {
                                        $solicitudes = unserialize($_SESSION["misSolicitudes"]);
                                        if(count($solicitudes) > 0) {
                                            foreach($solicitudes as $solicitud) {
                                ?>
                                                <div class="profileRequest" idVenta="<?php echo $solicitud->getIdVenta();?>">
                                                    <div class="profileRequestUser"><?php echo $solicitud->getUsuarioVenta();?></div>
                                                    <div class="profileRequestAd"><?php echo $solicitud->getAvisoVenta();?></div>
                                                    <div class="profileRequestQuantity"><?php echo $solicitud->getCantidadVenta();?></div>
                                                    <div class="profileRequestPay"><?php echo $solicitud->getMetodoPagoElegidoVenta();?></div>
                                                    <div class="profileRequestConfirm">
                                                        <div idVenta="<?php echo $solicitud->getIdVenta();?>" class="confirmBottom">Confirmar venta</div>
                                                    </div>
                                                </div>
                                <?php
                                            }
                                        }else {
                                ?>
                                            <div class='noResultAd'>Sin solicitudes de compra</div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <!--Pagina 5-->
                        <div class="profileSales">
                            <?php
                                $totalVentas = 0;
                                if(isset($_SESSION["totalVentas"])) {
                                    $totalVentas = $_SESSION["totalVentas"];
                                }
                            ?>
                            <div class="profileSalesHeader">
                                <div class="dateProfileSaleHeader">        Fecha          </div>
                                <div class="productProfileSaleHeader">     Producto       </div>
                                <div class="descriptionProfileSaleHeader"> Descripcion    </div>
                                <div class="quantityProfileSaleHeader">    Cantidad       </div>
                                <div class="priceProfileSaleHeader">       Precio         </div>
                                <div class="subtotalProfileSaleHeader">    Subtotal       </div>
                                <div class="payProfileSaleHeader">         Metodo de pago </div>
                                <div class="userProfileSaleHeader">        Comprador      </div>
                                <div class="totalProfileSale"> Total<div class="total"><?php echo $totalVentas; ?></div> </div>
                            </div>
                            <div class="profileSalesContainer">
                                <?php
                                    if(isset($_SESSION["misVentas"])) {
                                        $ventas = unserialize($_SESSION["misVentas"]);
                                        if(count($ventas) > 0) {
                                            foreach($ventas as $venta) {
                                ?>
                                                <div class="profileSale" idVenta="<?php echo $venta->getIdVenta(); ?>">
                                                    <div class="profileSaleDate"><?php echo $venta->getFechaVenta(); ?></div>
                                                    <div class="profileSaleProduct"><?php echo $venta->getProductoVenta(); ?></div>
                                                    <div class="profileSaleDescription"><?php echo $venta->getAvisoVenta(); ?></div>
                                                    <div class="profileSaleQuantity"><?php echo $venta->getCantidadVenta(); ?></div>
                                                    <div class="profileSalePrice"><?php echo $venta->getPrecioVenta(); ?></div>
                                                    <div class="profileSaleSubtotal"><?php echo $venta->getSubtotal(); ?></div>
                                                    <div class="profileSalePay"><?php echo $venta->getMetodoPagoElegidoVenta(); ?></div>
                                                    <div class="profileSaleUser"><?php echo $venta->getUsuarioVenta(); ?></div>
                                                </div>
                                <?php
                                            }
                                        } else {
                                ?>
                                            <div class='noResultAd'>Sin ventas</div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <!--Pagina 6-->
                        <div class="profileUpload_Product">
                            <form class="newForm" id="formUploadProduct" method="POST" enctype="multipart/form-data" action="/__BDM/controller/setProducto.php">
                                <div class="headerUpload" id="headerNewP" idProducto="">Nuevo Producto</div>
                                <div class="new">
                                    <div class="leftColumn">
                                        <div class="verifyAd">
                                            <div class="titleInput">Nombre</div>
                                            <div class="adInput">
                                                <input type="text" class="form-control inputNewAd" placeholder="Nombre..." id="pName" name="upName"/>
                                            </div>
                                            <div class="verifyAdInput" id="vPName"></div>
                                        </div>
                                        <div class="verifyAd">
                                            <div class="titleInput">Precio</div>
                                            <div class="adInput">
                                                <input type="text" class="form-control inputNewAd" placeholder="15.00" id="pPrice" name="upPrice"/>
                                            </div>
                                            <div class="verifyAdInput" id="vPPrice"></div>
                                        </div>
                                        <div class="verifyAd">
                                            <div class="titleInput">Vigencia</div>
                                            <div class="adInput" style="position:relative;z-index:500;">
                                                <div id="label-vigenciaProducto" class="form-control labelDate" style="padding-top:4%;font-weight:600;" title="Click para ajustar la fecha"></div>
                                                <div id="fecha-vigenciaProducto" class="date">
                                                    <div class="ym">
                                                        <div class="y">
                                                            <select id="anio-vigenciaProducto" class="btn btn-white year">
                                                            </select>
                                                        </div>
                                                        <div class="m">
                                                            <div id="mesAnterior-vigenciaProducto" class="btn-black prev">
                                                                <img class="imgPrev" src="/__BDM/img/icons/left.png"/>
                                                            </div>
                                                            <div id="mesAnterior-vigenciaProducto" class="btn-white month">
                                                                <div class="1vigenciaProducto"  dias="31">Enero</div>
                                                                <div class="2vigenciaProducto"  dias="28">Febrero</div>
                                                                <div class="3vigenciaProducto"  dias="31">Marzo</div>
                                                                <div class="4vigenciaProducto"  dias="30">Abril</div>
                                                                <div class="5vigenciaProducto"  dias="31">Mayo</div>
                                                                <div class="6vigenciaProducto"  dias="30">Junio</div>
                                                                <div class="7vigenciaProducto"  dias="31">Julio</div>
                                                                <div class="8vigenciaProducto"  dias="31">Agosto</div>
                                                                <div class="9vigenciaProducto"  dias="30">Septiembre</div>
                                                                <div class="10vigenciaProducto" dias="31">Octubre</div>
                                                                <div class="11vigenciaProducto" dias="30">Noviembre</div>
                                                                <div class="12vigenciaProducto" dias="31">Diciembre</div>
                                                            </div>
                                                            <div id="mesSiguiente-vigenciaProducto" class="btn-black next">
                                                                <img class="imgNext" src="/__BDM/img/icons/right.png"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="dia-vigenciaProducto" class="d">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="verifyAdInput" id="vPDate"></div>
                                        </div>
                                        <div class="verifyAd">
                                            <div class="titleInput">Existencia</div>
                                            <div class="adInput">
                                                <input type="text" class="form-control inputNewAd" placeholder="Existencia..." id="pStock" name="upStock"/>
                                            </div>
                                            <div class="verifyAdInput" id="vPStock"></div>
                                        </div>
                                        <div class="verifyAdExtend">
                                            <div class="titleInputExtend">Descripcion</div>
                                            <div class="adInputExtend">
                                                <textarea class="form-control inputNewAd" placeholder="Esta descripcion sera visible en resultados de busqueda..." id="pShort" name="upShort"></textarea>
                                            </div>
                                            <div class="verifyAdInputExtend" id="vPShort"></div>
                                        </div>
                                        <div class="verifyAdExtend">
                                            <div class="titleInputExtend">Caracteristicas</div>
                                            <div class="adInputExtend">
                                                <textarea class="form-control inputNewAd" placeholder="Esta descripcion sera visible al visualizar tu anuncio..." id="pLong" name="upLong"></textarea>
                                            </div>
                                            <div class="verifyAdInputExtend" id="vPLong"></div>
                                        </div>
                                        <div class="errorAds">
                                            <div class="errorAdsBox" id="pErrors">
                                                <!--<div class="errorAd">Error</div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rightColumn">
                                        <div class="verifyAd">
                                            <div class="titleInput">Imagen 1</div>
                                            <div class="adInput productInput">
                                                <label class="fileInput" for="file_1" id="label1">Archivo...</label>
                                                <input type="file" name="fileU1" class="pImage" id="file_1" number="1"/>
                                            </div>
                                           <div class="imgUpdateProduct">
                                                <img class="imgUpdateProductSrc" id="imgP1" idImagen="">
                                           </div>
                                            <div class="verifyAdInput fileVerifyProduct" id="vPImage1"></div>
                                        </div>
                                        <div class="verifyAd">
                                            <div class="titleInput">Imagen 2</div>
                                            <div class="adInput productInput">
                                                <label class="fileInput" for="file_2" id="label2">Archivo...</label>
                                                <input type="file" name="fileU2" class="pImage" id="file_2" number="2"/>
                                            </div>
                                            <div class="imgUpdateProduct">
                                                <img class="imgUpdateProductSrc" id="imgP2" idImagen="">
                                           </div>
                                            <div class="verifyAdInput fileVerifyProduct" id="vPImage2"></div>
                                        </div>
                                        <div class="verifyAd">
                                            <div class="titleInput">Imagen 3</div>
                                            <div class="adInput productInput">
                                                <label class="fileInput" for="file_3" id="label3">Archivo...</label>
                                                <input type="file" name="fileU3" class="pImage" id="file_3" number="3"/>
                                            </div>
                                            <div class="imgUpdateProduct">
                                                <img class="imgUpdateProductSrc" id="imgP3" idImagen="">
                                           </div>
                                            <div class="verifyAdInput fileVerifyProduct" id="vPImage3"></div>
                                        </div>
                                        <div class="verifyAd">
                                            <div class="titleInput">Imagen 4</div>
                                            <div class="adInput productInput">
                                                <label class="fileInput" for="file_4" id="label4">Archivo...</label>
                                                <input type="file" name="fileU4" class="pImage" id="file_4" number="4"/>
                                            </div>
                                            <div class="imgUpdateProduct">
                                                <img class="imgUpdateProductSrc" id="imgP4" idImagen="">
                                           </div>
                                            <div class="verifyAdInput fileVerifyProduct" id="vPImage4"></div>
                                        </div>
                                        <div class="verifyAd">
                                            <div class="titleInput">Video 1</div>
                                            <div class="adInput productInput">
                                                <label class="fileInput" for="file_5" id="label5">Archivo...</label>
                                                <input type="file" name="fileU5" class="pVideo" id="file_5" number="5"/>
                                            </div>
                                            <div class="imgUpdateProduct">
                                                <img class="imgUpdateProductSrc" id="imgP5" idVideo="">
                                           </div>
                                            <div class="verifyAdInput fileVerifyProduct" id="vPVideo1"></div>
                                        </div>
                                        <div class="verifyAd">
                                            <div class="titleInput">Video 2</div>
                                            <div class="adInput productInput">
                                                <label class="fileInput" for="file_6" id="label6">Archivo...</label>
                                                <input type="file" name="fileU6" class="pVideo" id="file_6" number="6"/>
                                            </div>
                                            <div class="imgUpdateProduct">
                                                <img class="imgUpdateProductSrc" id="imgP6" idVideo="">
                                           </div>
                                            <div class="verifyAdInput fileVerifyProduct" id="vPVideo2"></div>
                                        </div>
                                        <div class="actionsAd">
                                            <div class="cancel btn" id="cancelNewProduct">Cancelar</div>
                                            <div class="ok btn" id="okNewProduct">Crear producto</div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Pagina 7-->
                        <div class="profileUpload_Ad">
                            <div class="headerUpload" id="headerNewA" idAviso="">Nuevo Aviso</div>
                            <div class="new">
                                <div class="leftColumn">
                                    <div class="verifyAd">
                                        <div class="titleInput">Cantidad</div>
                                        <div class="adInput">
                                            <input type="text" class="form-control inputNewAd" placeholder="Cantidad..." id="aStock"/>
                                        </div>
                                        <div class="verifyAdInput" id="vAStock"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Precio</div>
                                        <div class="adInput">
                                            <input type="text" class="form-control inputNewAd" placeholder="15.00" id="aPrice"/>
                                        </div>
                                        <div class="verifyAdInput" id="vAPrice"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Vigencia</div>
                                        <div class="adInput" style="position:relative;z-index:500;">
                                            <div id="label-vigenciaAviso" class="form-control labelDate" style="padding-top:4%;font-weight:600;" title="Click para ajustar la fecha"></div>
                                            <div id="fecha-vigenciaAviso" class="date">
                                                <div class="ym">
                                                    <div class="y">
                                                        <select id="anio-vigenciaAviso" class="btn btn-white year">
                                                        </select>
                                                    </div>
                                                    <div class="m">
                                                        <div id="mesAnterior-vigenciaAviso" class="btn-black prev">
                                                            <img class="imgPrev" src="/__BDM/img/icons/left.png"/>
                                                        </div>
                                                        <div id="mesAnterior-vigenciaAviso" class="btn-white month">
                                                            <div class="1vigenciaAviso"  dias="31">Enero</div>
                                                            <div class="2vigenciaAviso"  dias="28">Febrero</div>
                                                            <div class="3vigenciaAviso"  dias="31">Marzo</div>
                                                            <div class="4vigenciaAviso"  dias="30">Abril</div>
                                                            <div class="5vigenciaAviso"  dias="31">Mayo</div>
                                                            <div class="6vigenciaAviso"  dias="30">Junio</div>
                                                            <div class="7vigenciaAviso"  dias="31">Julio</div>
                                                            <div class="8vigenciaAviso"  dias="31">Agosto</div>
                                                            <div class="9vigenciaAviso"  dias="30">Septiembre</div>
                                                            <div class="10vigenciaAviso" dias="31">Octubre</div>
                                                            <div class="11vigenciaAviso" dias="30">Noviembre</div>
                                                            <div class="12vigenciaAviso" dias="31">Diciembre</div>
                                                        </div>
                                                        <div id="mesSiguiente-vigenciaAviso" class="btn-black next">
                                                            <img class="imgNext" src="/__BDM/img/icons/right.png"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="dia-vigenciaAviso" class="d">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="verifyAdInput" id="vADate"></div>
                                    </div>
                                    <div class="verifyAdExtend">
                                        <div class="titleInputExtend">Descripcion breve</div>
                                        <div class="adInputExtend">
                                            <textarea class="form-control inputNewAd" placeholder="Esta descripcion sera visible en resultados de busqueda..." id="aShort"></textarea>
                                        </div>
                                        <div class="verifyAdInputExtend" id="vAShort"></div>
                                    </div>
                                    <div class="verifyAdExtend">
                                        <div class="titleInputExtend">Descripcion extendida</div>
                                        <div class="adInputExtend">
                                            <textarea class="form-control inputNewAd" placeholder="Esta descripcion sera visible al visualizar tu anuncio..." id="aLong"></textarea>
                                        </div>
                                        <div class="verifyAdInputExtend" id="vALong"></div>
                                    </div>
                                    <div class="errorAds">
                                        <div class="errorAdsBox" id="aErrors">
                                            <!--<div class="errorAd">Error</div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="rightColumn">
                                    <div class="verifyAd">
                                        <div class="titleInput">Producto</div>
                                        <div class="adInput">
                                            <select class="inputNewAd" id="aProduct">
                                                <?php
                                                $productos = null;
                                                if(isset($_SESSION["misProductos"])) {
                                                    $productos = unserialize($_SESSION["misProductos"]);
                                                    if(count($productos) > 0) {
                                                        echo "<option value='' disabled selected>Elige un producto</option>";
                                                        foreach($productos as $producto) {
                                                            if(file_exists ( $_SESSION['raiz'].$producto->getPathThumbnail() )) {
                                                                $url = $producto->getPathThumbnail();
                                                            } else {
                                                                $url = "/__BDM/img/404/dino.png";
                                                            }
                                                            ?>
                                                            <option val="<?php echo $producto->getIdProducto(); ?>"><?php echo $producto->getNombreProducto(); ?></option>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <option value="" disabled selected>Sin productos</option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="verifyAdInput" id="vAProduct"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Categoria</div>
                                        <div class="adInput">
                                            <select class="inputNewAd" id="aCategory">
                                                <option value="" disabled selected>Elige una categoria</option>
                                                <?php
                                                $categorias = unserialize($_SESSION['categoria']);
                                                foreach($categorias as $categoria) {
                                                    if($categoria->activoCategoria==1) {
                                                        ?>
                                                        <option value="<?php echo $categoria->getIdCategoria(); ?>"><?php echo $categoria->getNombreCategoria() ?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="verifyAdInput" id="vACategory"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Subcategoria</div>
                                        <div class="adInput">
                                            <select class="inputNewAd" id="aSubcategory">
                                                <option value="" disabled selected>Elige una subcategoria</option>
                                            </select>
                                        </div>
                                        <div class="verifyAdInput" id="vASubcategory"></div>
                                    </div>
                                    
                                    <div class="payContainer">
                                        <div class="titlePay">Metodos de pago</div>
                                        <div class="payBody">
                                            <?php
                                                if(isset($_SESSION["metodosPago"])) {
                                                    $metodos = unserialize($_SESSION["metodosPago"]);
                                                    foreach($metodos as $metodo) {
                                            ?>
                                                        <div class="pay" idMetodoPago="<?php echo $metodo->getIdMetodoPago(); ?>" check="false"><?php echo $metodo->getNombreMetodoPago(); ?></div>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <div class="verifyAdPay" id="vAPay"></div>
                                    </div>
                                    
                                    <div class="actionsAd">
                                        <div class="cancel" id="cancelNewAd">Cancelar</div>
                                        <div class="ok btn" id="okNewAd">Crear aviso</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightSkyscraper">
                <?php   include $_SESSION['raiz']."/__BDM/resources/php/profile_right.php";
                        include $_SESSION['raiz']."/__BDM/resources/php/profileEdit.php"; ?>
            </div>
            <div class="errorBox"></div>
        </div>
        <div class="errorBox">
            <div class="superError"></div>
        </div>
    </body>
</html>