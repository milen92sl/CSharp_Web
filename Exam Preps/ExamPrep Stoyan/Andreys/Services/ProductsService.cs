using System.Collections.Generic;
using System.Linq;
using Andreys.Data;
using Andreys.Models;

namespace Andreys.Services
{
    using System;
    using Andreys.ViewModels.Products;

   public  class ProductsService : IProductsService
   {
       private readonly AndreysDbContext dbContext;
        public ProductsService(AndreysDbContext dbContext)
        {
            this.dbContext = dbContext;
        }
        public int Add(ProductAddInputModel productAddInputModel)
        {
            var genderAsEnum = Enum.Parse<Gender>(productAddInputModel.Gender);
            var categoryAsEnum = Enum.Parse<Category>(productAddInputModel.Category);

            var product = new Product()
            {
                Name = productAddInputModel.Name,
                Description = productAddInputModel.Description,
                ImageUrl = productAddInputModel.ImageUrl,
                Price = productAddInputModel.Price,
                Category = categoryAsEnum,
                Gender = genderAsEnum,
            };
            this.dbContext.Add(product);
            this.dbContext.SaveChanges();

            return product.Id;
        }

        public IEnumerable<Product> GetAll()
        {
           return this.dbContext.Products.Select(x=> new Product
           {
               Id = x.Id,
               Name = x.Name,
               ImageUrl = x.ImageUrl,
               Price = x.Price,
           }).ToArray();
        }
   }
}
