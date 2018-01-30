/*<![CDATA[*/

(function() {

	var scriptURL                 = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';
	var productComponentID        = shopify_product_vars.product_component_id;
	var productID                 = shopify_product_vars.product_id;
	var displayIFrame             = shopify_product_vars.iframe;
	var displayLayout             = shopify_product_vars.layout;
	var displayImage              = shopify_product_vars.image;
	var displayImageCarousel      = shopify_product_vars.image_carousel;
	var displayTitle              = shopify_product_vars.title;
	var displayPrice              = shopify_product_vars.price;
	var displayButtonWithQuantity = shopify_product_vars.button_with_quantity;
	var displayButton             = shopify_product_vars.button;
	var displayQuantity           = shopify_product_vars.quantity;
	var displayQuantityIncrement  = shopify_product_vars.quantity_increment;
	var displayQuantityDecrement  = shopify_product_vars.quantity_decrement;
	var displayAlignment          = shopify_product_vars.alignment;
	var displayDescription        = shopify_product_vars.description;
	var textButtonText            = shopify_product_vars.button_text;

	if (window.ShopifyBuy) {
		if (window.ShopifyBuy.UI) {
			ShopifyBuyInit();
		} else {
			loadScript();
		}
	} else {
		loadScript();
	}

	function loadScript() {
		var script = document.createElement('script');
		script.async = true;
		script.src = scriptURL;
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
		script.onload = ShopifyBuyInit;
	}

	function ShopifyBuyInit() {
		var client = ShopifyBuy.buildClient({
			domain: 'di-oro-living.myshopify.com',
			apiKey: '330ad9f737e0602b5748d3891020aa27',
			appId: '6',
		});

		ShopifyBuy.UI.onReady(client).then(function(ui) {
			ui.createComponent('product', {
				id: [productID],
				node: document.getElementById('product-component-' + productComponentID),
				moneyFormat: '%24%7B%7Bamount%7D%7D',
				options: {
					"product": {
						"iframe": displayIFrame, // default true
						"buttonDestination": "cart",
						"variantId": "all",
						"isButton": false,
						"layout": displayLayout, // default vertical
						"width": "100%",
						"contents": {
							"img": displayImage, // default true
							"imgWithCarousel": displayImageCarousel, // default false
							"title": displayTitle, // default true
							"variantTitle": false,
							"price": displayPrice, // default true
							"buttonWithQuantity": displayButtonWithQuantity, // default false
							"button": displayButton, // default true
							"quantity": displayQuantity, // default false
							"quantityIncrement": displayQuantityIncrement, // default false
							"quantityDecrement": displayQuantityDecrement, // default false
							"description": displayDescription // default true
						},
						"text": {
							 "button": textButtonText,
							 "outOfStock": "Out of Stock",
							 "unavailable": "Unavailable"
						},
						"styles": {
							"product": {
								"text-align": "left", // var is displayAlignment
								"@media (min-width: 601px)": {
									"max-width": "100%",
									"margin-left": "0",
									"margin-bottom": "50px"
								}
							},
							"button": {
								"background-color": "#38bffc",
								"font-family": "Gibson, sans-serif",
								"font-size": "13px",
								"padding-top": "14.5px",
								"padding-bottom": "14.5px",
								"padding-left": "26px",
								"padding-right": "26px",
								":hover": {
									"background-color": "#32ace3"
								},
								"border-radius": "2px",
								":focus": {
									"background-color": "#32ace3"
								},
								"font-weight": "600"
							},
							"variantTitle": {
								"font-family": "Gibson, sans-serif",
								"font-weight": "normal"
							},
							"title": {
								"font-family": "Gibson, sans-serif",
								"font-weight": "300",
								"font-size": "30px"
							},
							"description": {
								"font-family": "Gibson, sans-serif",
								"font-weight": "normal"
							},
							"price": {
								"font-family": "Gibson, sans-serif",
								"font-size": "16px",
								"font-weight": "600"
							},
							"quantityInput": {
								"font-size": "13px",
								"padding-top": "14.5px",
								"padding-bottom": "14.5px"
							},
							"compareAt": {
								"font-size": "14px",
								"font-family": "Gibson, sans-serif",
								"font-weight": "normal",
								"color": "#ee3129"
							}
						}
					},
					"cart": {
						"contents": {
							"button": true
						},
						"text": {
							"title": "Shopping Cart"
						},
						"styles": {
							"button": {
								"background-color": "#38bffc",
								"font-family": "Gibson, sans-serif",
								"font-size": "13px",
								"padding-top": "14.5px",
								"padding-bottom": "14.5px",
								":hover": {
									"background-color": "#32ace3"
								},
								"border-radius": "2px",
								":focus": {
									"background-color": "#32ace3"
								},
								"font-weight": "normal"
							},
							"footer": {
								"background-color": "#ffffff"
							}
						}
					},
					"lineItem": {
						"contents": {
							"image": true,
							"variantTitle": true,
							"price": true
						}
					},
					"modalProduct": {
						"contents": {
							"img": false,
							"imgWithCarousel": true,
							"variantTitle": false,
							"buttonWithQuantity": true,
							"button": false,
							"quantity": false
						},
						"styles": {
							"product": {
								"@media (min-width: 601px)": {
									"max-width": "100%",
									"margin-left": "0px",
									"margin-bottom": "0px"
								}
							},
							"button": {
								"background-color": "#38bffc",
								"font-family": "Gibson, sans-serif",
								"font-size": "13px",
								"padding-top": "14.5px",
								"padding-bottom": "14.5px",
								"padding-left": "26px",
								"padding-right": "26px",
								":hover": {
									"background-color": "#32ace3"
								},
								"border-radius": "2px",
								":focus": {
									"background-color": "#32ace3"
								},
								"font-weight": "normal"
							},
							"variantTitle": {
								"font-family": "Gibson, sans-serif",
								"font-weight": "normal"
							},
							"title": {
								"font-family": "Gibson, sans-serif",
								"font-weight": "normal"
							},
							"description": {
								"font-family": "Gibson, sans-serif",
								"font-weight": "normal"
							},
							"price": {
								"font-family": "Gibson, sans-serif",
								"font-weight": "normal"
							},
							"quantityInput": {
								"font-size": "13px",
								"padding-top": "14.5px",
								"padding-bottom": "14.5px"
							},
							"compareAt": {
								"font-family": "Gibson, sans-serif",
								"font-weight": "normal"
							}
						}
					},
					"toggle": {
						"styles": {
							"toggle": {
								"font-family": "Gibson, sans-serif",
								"background-color": "#38bffc",
								":hover": {
									"background-color": "#32ace3"
								},
								":focus": {
									"background-color": "#32ace3"
								},
								"font-weight": "normal"
							},
							"count": {
								"color": "#ffffff",
								":hover": {
									"color": "#ffffff"
								},
								"font-size": "13px"
							},
							"iconPath": {
								"fill": "#ffffff"
							}
						}
					},
					"option": {
						"styles": {
							"label": {
								"font-family": "Gibson, sans-serif"
							},
							"select": {
								"font-family": "Gibson, sans-serif"
							}
						}
					},
					"productSet": {
						"styles": {
							"products": {
								"@media (min-width: 601px)": {
									"margin-left": "-20px"
								}
							}
						}
					},
					"window": {
						"height": "800",
						"width": "1200",
						"toolbar": 0,
						"scrollbars": 0,
						"status": 0, // 1 to open in new tab; 0 to open in new window
						"resizeable": 0,
						"createnew": 1,
						"location": 0, // currently does nothing?
						"menubar": 0
					}
				}
			});
		});
	}
})();
/*]]>*/
