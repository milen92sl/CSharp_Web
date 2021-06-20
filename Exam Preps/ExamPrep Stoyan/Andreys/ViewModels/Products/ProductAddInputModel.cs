namespace Andreys.ViewModels.Products
{
    using System.ComponentModel.DataAnnotations;
   public class ProductAddInputModel
    {
        [Required]
        public string Name { get; set; }
        [Required]
        public string Description { get; set; }
        [Required]
        public string ImageUrl { get; set; }
        public decimal Price { get; set; }
        public string Category { get; set; }
        public string Gender { get; set; }
    }
}
