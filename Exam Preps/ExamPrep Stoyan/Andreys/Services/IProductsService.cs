using Andreys.Models;

namespace Andreys.Services
{
    using System.Collections.Generic;
    using Andreys.ViewModels.Products;
    public interface IProductsService
    { 
        public int Add(ProductAddInputModel productAddInputModel);
        public IEnumerable<Product> GetAll();
    }
}
