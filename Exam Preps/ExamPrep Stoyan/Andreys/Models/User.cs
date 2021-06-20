namespace Andreys.Models
{
    using System.ComponentModel.DataAnnotations;
    using SIS.MvcFramework;
    public class User : IdentityUser<string>
    {
        public string Id { get; set; }

        [MaxLength(10)]
        [Required]
        public string Username { get; set; }

        [Required]
        public string Email { get; set; }

        [Required]
        public string Password { get; set; }

        public IdentityRole Role { get; set; }
    }
}
