<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Search</title>
    <link rel="stylesheet" href='/css/search_doctor_styles.css'>
</head>
<body>
    <div class="search-container">
        <h1>Find Your Doctor</h1>
        <form action="#" method="get">
            
            <!-- Specialization Field -->
            <div class="form-group">
                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization" placeholder="Enter specialization">
            </div>
            
            <!-- Location Field -->
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" placeholder="Enter location">
            </div>
            
            <!-- Years of Experience Field -->
            <div class="form-group">
                <label for="experience">Years of Experience:</label>
                <input type="number" id="experience" name="experience" placeholder="Enter years of experience">
            </div>
            
            <!-- Education & Qualifications Field -->
            <div class="form-group">
                <label for="education">Education & Qualifications:</label>
                <input type="text" id="education" name="education" placeholder="Enter education and qualifications">
            </div>
            
           
            
            <!-- Gender Field -->
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <!-- Ratings and Reviews Field -->
            <div class="form-group">
                <label for="ratings">Ratings & Reviews:</label>
                <input type="number" id="ratings" name="ratings" step="0.1" max="5" min="0" placeholder="Enter rating (0-5)">
            </div>
            
            <!-- Availability Field -->
            <div class="form-group">
                <label for="availability">Availability:</label>
                <input type="text" id="availability" name="availability" placeholder="Enter available hours/days">
            </div>
            
          
            
           
            
            <!-- Search Button -->
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>
</body>
</html>
