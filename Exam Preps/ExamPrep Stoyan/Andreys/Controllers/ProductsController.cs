using Andreys.Services;
using Andreys.ViewModels.Products;
using SIS.HTTP;

namespace Andreys.Controllers
{
    using SIS.MvcFramework;
    public class ProductsController : Controller
    {
        private readonly IProductsService productsService;

        public ProductsController(IProductsService productsService)
        {
            this.productsService = productsService;
        }
        public HttpResponse Add()
        {
            return this.View();
        }

        [HttpPost]
        public HttpResponse Add(ProductAddInputModel inputModel)
        {
            //TODO: Add validation

            var productId = this.productsService.Add(inputModel);

            return this.View();
        }
    }
}
