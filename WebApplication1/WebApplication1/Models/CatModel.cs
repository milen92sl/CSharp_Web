namespace WebApplication1.Models
{
    public class CatModel
    {
        public string Name { get; init; }
        public int Age { get; init; }

        public Owner Owner { get; set; }
    }
}
