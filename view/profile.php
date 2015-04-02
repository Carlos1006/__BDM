<!DOCTYPE HTML>
<html>
    <head>
        <title>Profile</title>
        <?php 
                session_start();
                include $_SESSION['raiz']."/__BDM/resources/php/include.php"; 
        ?>
        <script src="/__BDM/resources/js/profile.js"></script>
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
                        <div class="profileHeader headerAds"      check="true"  for="profileAds"       > Avisos      </div>
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
                                <div class="profileAd" idAviso="1">
                                    <div class="profileImageAd">
                                        <img class="profileImageAdSrc" src="http://cdni.wired.co.uk/1240x826/g_j/ipod-nano-3.jpg"/>
                                    </div>
                                    <div class="profileDescriptionAd">Vendo Ipod Nano 16gb color azul</div>
                                    <div class="profilePriceAd">2500.00</div>
                                    <div class="profileDateAd">26/Octubre/2015</div>
                                    <div class="profileActionAd">
                                        <div class="viewAction">
                                            <img class="viewImg" src="/__BDM/img/icons/view-128.png">
                                        </div>
                                        <div class="editAction">
                                            <img class="editImg"  src="/__BDM/img/icons/editAd.png">
                                        </div>
                                        <div class="deleteAction">
                                            <img class="deleteImg" src="/__BDM/img/icons/deleteAdd.png">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="profileAd" idAviso="2">
                                    <div class="profileImageAd">
                                        <img class="profileImageAdSrc" src="http://guiamexico.com.mx/Imagenes/b/201139757-1-refri-mar.jpeg"/>
                                    </div>
                                    <div class="profileDescriptionAd">Refrigerador plateado nuevo, sin abrir.</div>
                                    <div class="profilePriceAd">2500.00</div>
                                    <div class="profileDateAd">26/Octubre/2015</div>
                                    <div class="profileActionAd">
                                        <div class="viewAction">
                                            <img class="viewImg" src="/__BDM/img/icons/view-128.png">
                                        </div>
                                        <div class="editAction">
                                            <img class="editImg"  src="/__BDM/img/icons/editAd.png">
                                        </div>
                                        <div class="deleteAction">
                                            <img class="deleteImg" src="/__BDM/img/icons/deleteAdd.png">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="profileAd" idAviso="3">
                                    <div class="profileImageAd">
                                        <img class="profileImageAdSrc" src="http://www.listofimages.com/wp-content/uploads/2013/08/mitsubishi-lancer-evo-x-red-car.jpg"/>
                                    </div>
                                    <div class="profileDescriptionAd">Automovil seminuevo, poco kilometraje.</div>
                                    <div class="profilePriceAd">2500.00</div>
                                    <div class="profileDateAd">26/Octubre/2015</div>
                                    <div class="profileActionAd">
                                        <div class="viewAction">
                                            <img class="viewImg" src="/__BDM/img/icons/view-128.png">
                                        </div>
                                        <div class="editAction">
                                            <img class="editImg"  src="/__BDM/img/icons/editAd.png">
                                        </div>
                                        <div class="deleteAction">
                                            <img class="deleteImg" src="/__BDM/img/icons/deleteAdd.png">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="profileAd" idAviso="4">
                                    <div class="profileImageAd">
                                        <img class="profileImageAdSrc" src="http://core0.staticworld.net/images/article/2013/05/microsoft_sculpt_mobile_mouse_left_2013-100038808-orig.jpg"/>
                                    </div>
                                    <div class="profileDescriptionAd">Mouse marca microsoft.</div>
                                    <div class="profilePriceAd">2500.00</div>
                                    <div class="profileDateAd">26/Octubre/2015</div>
                                    <div class="profileActionAd">
                                        <div class="viewAction">
                                            <img class="viewImg" src="/__BDM/img/icons/view-128.png">
                                        </div>
                                        <div class="editAction">
                                            <img class="editImg"  src="/__BDM/img/icons/editAd.png">
                                        </div>
                                        <div class="deleteAction">
                                            <img class="deleteImg" src="/__BDM/img/icons/deleteAdd.png">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="profileAd" idAviso="5">
                                    <div class="profileImageAd">
                                        <img class="profileImageAdSrc" src="http://www.kiabi.es/images/camisa-de-algodon-de-sarga-con-acabado-a-contraste-uva-joven-nino-et591_2_zc1.jpg"/>
                                    </div>
                                    <div class="profileDescriptionAd">Camisa casual color morado, talla chica.</div>
                                    <div class="profilePriceAd">2500.00</div>
                                    <div class="profileDateAd">26/Octubre/2015</div>
                                    <div class="profileActionAd">
                                        <div class="viewAction">
                                            <img class="viewImg" src="/__BDM/img/icons/view-128.png">
                                        </div>
                                        <div class="editAction">
                                            <img class="editImg"  src="/__BDM/img/icons/editAd.png">
                                        </div>
                                        <div class="deleteAction">
                                            <img class="deleteImg" src="/__BDM/img/icons/deleteAdd.png">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="profileAd" idAviso="6">
                                    <div class="profileImageAd">
                                        <img class="profileImageAdSrc" src="http://s3.amazonaws.com/rapgenius/filepicker%2F5jTDmubSTnCREE8BIe5w_nike_shoes.jpg"/>
                                    </div>
                                    <div class="profileDescriptionAd">Tennis nike color negro.</div>
                                    <div class="profilePriceAd">2500.00</div>
                                    <div class="profileDateAd">26/Octubre/2015</div>
                                    <div class="profileActionAd">
                                        <div class="viewAction">
                                            <img class="viewImg" src="/__BDM/img/icons/view-128.png">
                                        </div>
                                        <div class="editAction">
                                            <img class="editImg"  src="/__BDM/img/icons/editAd.png">
                                        </div>
                                        <div class="deleteAction">
                                            <img class="deleteImg" src="/__BDM/img/icons/deleteAdd.png">
                                        </div>
                                    </div>
                                </div>
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
                                
                                <div class="profileProduct" idProducto="1">
                                    <div class="profileImageProduct">
                                        <img class="profileImageProductSrc" src="http://cdni.wired.co.uk/1240x826/g_j/ipod-nano-3.jpg"/>
                                    </div>
                                    <div class="profileNameProduct">Ipod Nano</div>
                                    <div class="profileStockProduct">1200</div>
                                    <div class="profileDateProduct">26/Octubre/2015</div>
                                    <div class="profileActionProduct">
                                        <div class="viewAction">
                                            <img class="viewImg" src="/__BDM/img/icons/view-128.png">
                                        </div>
                                        <div class="editAction">
                                            <img class="editImg"  src="/__BDM/img/icons/editAd.png">
                                        </div>
                                        <div class="deleteAction">
                                            <img class="deleteImg" src="/__BDM/img/icons/deleteAdd.png">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="profileProduct" idProducto="1">
                                    <div class="profileImageProduct">
                                        <img class="profileImageProductSrc" src="http://s3.amazonaws.com/rapgenius/filepicker%2F5jTDmubSTnCREE8BIe5w_nike_shoes.jpg"/>
                                    </div>
                                    <div class="profileNameProduct">Tennis</div>
                                    <div class="profileStockProduct">1200</div>
                                    <div class="profileDateProduct">26/Octubre/2015</div>
                                    <div class="profileActionProduct">
                                        <div class="viewAction">
                                            <img class="viewImg" src="/__BDM/img/icons/view-128.png">
                                        </div>
                                        <div class="editAction">
                                            <img class="editImg"  src="/__BDM/img/icons/editAd.png">
                                        </div>
                                        <div class="deleteAction">
                                            <img class="deleteImg" src="/__BDM/img/icons/deleteAdd.png">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="profileProduct" idProducto="1">
                                    <div class="profileImageProduct">
                                        <img class="profileImageProductSrc" src="http://core0.staticworld.net/images/article/2013/05/microsoft_sculpt_mobile_mouse_left_2013-100038808-orig.jpg"/>
                                    </div>
                                    <div class="profileNameProduct">Mouse</div>
                                    <div class="profileStockProduct">1200</div>
                                    <div class="profileDateProduct">26/Octubre/2015</div>
                                    <div class="profileActionProduct">
                                        <div class="viewAction">
                                            <img class="viewImg" src="/__BDM/img/icons/view-128.png">
                                        </div>
                                        <div class="editAction">
                                            <img class="editImg"  src="/__BDM/img/icons/editAd.png">
                                        </div>
                                        <div class="deleteAction">
                                            <img class="deleteImg" src="/__BDM/img/icons/deleteAdd.png">
                                        </div>
                                    </div>
                                </div>
                                
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
                                <div class="profileQuestion">
                                    <div class="profileQuestionUser">Carlos19</div>
                                    <div class="profileQuestionDescription">De que color son?</div>
                                    <div class="profileQuestionAd">Ipod Nano</div>
                                    <div class="profileQuestionAnswer">
                                        <input class="profileQuestionAnswerInput form-control" placeholder="Escribe tu respuesta..."/>
                                        <div class="answerButton">Responde</div>
                                    </div>
                                </div>
                                
                                <div class="profileQuestion">
                                    <div class="profileQuestionUser">Carlos19</div>
                                    <div class="profileQuestionDescription">De que color son?</div>
                                    <div class="profileQuestionAd">Ipod Nano</div>
                                    <div class="profileQuestionAnswer">
                                        <input class="profileQuestionAnswerInput form-control" placeholder="Escribe tu respuesta..."/>
                                        <div class="answerButton">Responde</div>
                                    </div>
                                </div>
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
                                <div class="profileRequest">
                                    <div class="profileRequestUser">Naker21</div>
                                    <div class="profileRequestAd">Ipod Nano color rosa</div>
                                    <div class="profileRequestQuantity">2</div>
                                    <div class="profileRequestPay">Deposito bancario</div>
                                    <div class="profileRequestConfirm">
                                        <div class="confirmBottom">Confirmar venta</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Pagina 5-->
                        <div class="profileSales">
                            <div class="profileSalesHeader">
                                <div class="dateProfileSaleHeader">        Fecha          </div>
                                <div class="productProfileSaleHeader">     Producto       </div>
                                <div class="descriptionProfileSaleHeader"> Descripcion    </div>
                                <div class="quantityProfileSaleHeader">    Cantidad       </div>
                                <div class="priceProfileSaleHeader">       Precio         </div>
                                <div class="subtotalProfileSaleHeader">    Subtotal       </div>
                                <div class="payProfileSaleHeader">         Metodo de pago </div>
                                <div class="userProfileSaleHeader">        Comprador      </div>
                                <div class="totalProfileSale"> Total<div class="total">500.00</div> </div>
                            </div>
                            <div class="profileSalesContainer">
                                <div class="profileSale">
                                    <div class="profileSaleDate">10/12/2019</div>
                                    <div class="profileSaleProduct">iPod nano</div>
                                    <div class="profileSaleDescription">iPod nano color rosa</div>
                                    <div class="profileSaleQuantity">2</div>
                                    <div class="profileSalePrice">2500.00</div>
                                    <div class="profileSaleSubtotal">5000.00</div>
                                    <div class="profileSalePay">Deposito bancario</div>
                                    <div class="profileSaleUser">Naker21</div>
                                </div>
                            </div>
                        </div>
                        <!--Pagina 6-->
                        <div class="profileUpload_Product">
                            <div class="headerUpload">Nuevo Producto</div>
                            <div class="new">
                                <div class="leftColumn">
                                    <div class="verifyAd">
                                        <div class="titleInput">Nombre</div>
                                        <div class="adInput">
                                            <input type="text" class="form-control inputNewAd" placeholder="Nombre..." id="pName"/>
                                        </div>
                                        <div class="verifyAdInput" id="vPName"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Precio</div>
                                        <div class="adInput">
                                            <input type="text" class="form-control inputNewAd" placeholder="15.00" id="pPrice"/>
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
                                            <input type="text" class="form-control inputNewAd" placeholder="Existencia..." id="pStock"/>
                                        </div>
                                        <div class="verifyAdInput" id="vPStock"></div>
                                    </div>
                                    <div class="verifyAdExtend">
                                        <div class="titleInputExtend">Descripcion</div>
                                        <div class="adInputExtend">
                                            <textarea class="form-control inputNewAd" placeholder="Esta descripcion sera visible en resultados de busqueda..." id="pShort"></textarea>
                                        </div>
                                        <div class="verifyAdInputExtend" id="vPShort"></div>
                                    </div>
                                    <div class="verifyAdExtend">
                                        <div class="titleInputExtend">Caracteristicas</div>
                                        <div class="adInputExtend">
                                            <textarea class="form-control inputNewAd" placeholder="Esta descripcion sera visible al visualizar tu anuncio..." id="pLong"></textarea>
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
                                        <div class="adInput">
                                            <label class="fileInput" for="file_1" id="label1">Archivo...</label>
                                            <input type="file" name="file" class="pImage" id="file_1" number="1"/>
                                        </div>
                                        <div class="verifyAdInput" id="vPImage1"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Imagen 2</div>
                                        <div class="adInput">
                                            <label class="fileInput" for="file_2" id="label2">Archivo...</label>
                                            <input type="file" name="file" class="pImage" id="file_2" number="2"/>
                                        </div>
                                        <div class="verifyAdInput" id="vPImage2"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Imagen 3</div>
                                        <div class="adInput">
                                            <label class="fileInput" for="file_3" id="label3">Archivo...</label>
                                            <input type="file" name="file" class="pImage" id="file_3" number="3"/>
                                        </div>
                                        <div class="verifyAdInput" id="vPImage3"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Imagen 4</div>
                                        <div class="adInput">
                                            <label class="fileInput" for="file_4" id="label4">Archivo...</label>
                                            <input type="file" name="file" class="pImage" id="file_4" number="4"/>
                                        </div>
                                        <div class="verifyAdInput" id="vPImage4"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Video 1</div>
                                        <div class="adInput">
                                            <label class="fileInput" for="file_5" id="label5">Archivo...</label>
                                            <input type="file" name="file" class="pVideo" id="file_5" number="5"/>
                                        </div>
                                        <div class="verifyAdInput" id="vPVideo1"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Video 2</div>
                                        <div class="adInput">
                                            <label class="fileInput" for="file_6" id="label6">Archivo...</label>
                                            <input type="file" name="file" class="pVideo" id="file_6" number="6"/>
                                        </div>
                                        <div class="verifyAdInput" id="vPVideo2"></div>
                                    </div>
                                    <div class="actionsAd">
                                        <div class="cancel btn" id="cancelNewProduct">Cancelar</div>
                                        <div class="ok btn" id="okNewProduct">Crear producto</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Pagina 7-->
                        <div class="profileUpload_Ad">
                            <div class="headerUpload">Nuevo Aviso</div>
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
                                                <option value="" disabled selected>Elige un producto</option>
                                                <option>carlos</option>
                                                <option>daniel</option>
                                            </select>
                                        </div>
                                        <div class="verifyAdInput" id="vAProduct"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Categoria</div>
                                        <div class="adInput">
                                            <select class="inputNewAd" id="aCategory">
                                                <option value="" disabled selected>Elige una categoria</option>
                                                <option>carlos</option>
                                                <option>daniel</option>
                                            </select>
                                        </div>
                                        <div class="verifyAdInput" id="vACategory"></div>
                                    </div>
                                    <div class="verifyAd">
                                        <div class="titleInput">Subcategoria</div>
                                        <div class="adInput">
                                            <select class="inputNewAd" id="aSubcategory">
                                                <option value="" disabled selected>Elige una subcategoria</option>
                                                <option>carlos</option>
                                                <option>daniel</option>
                                            </select>
                                        </div>
                                        <div class="verifyAdInput" id="vASubcategory"></div>
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