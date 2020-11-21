#ADMIN GRAPHS----------------------------------------
#Offer Type Code
type <- c("Internship", "Co-op", "Full-time")
job_type <- matrix(sample(type, 50, replace = T, c(0.4, 0.2, 0.4)))
colnames(job_type) <- c("job_type")

#Frequency of Each Offer Type Bar Chart
y <- count(job_type)
y$freq
y$job_type
barplot(y$freq, names.arg = y$job_type, main = "Frequency of Each Offer Type", ylab = "Number of Offers")

#Hard Skills

#Soft SKills

#Education Level
degree <- c("Freshman", "Sophomore", "Junior", "Senior")
ed_level <- matrix(sample(degree, 50, replace = T, c(0.6596, 0.2828, 0.0576,0.0576)))
colnames(ed_level) <- c("ed_level")

#Percentage Degree Type Bar Chart
w <- count(ed_level)
w$freq
w$ed_level
yes <- barplot(w$freq, names.arg = w$ed_level, main = "Percentage of Students per Grade", ylab = "Number of Students")

#Percentage Degree Type Pie
x <- c(0.6596, 0.2828, 0.0576,0.0576)
labels <- c("Freshman", "Sophomore", "Junior", "Senior")
pie(x,labels, radius = 1, main = "Student pie chart")

#Most Popular Courses

#EMPLOYER GRAPHS--------------------------------------------------
#Industry Code
ind <- c("Business-Related Fields", "Chemicals, Petroleum, Plastics & Rubber", "Computer Systems - Design/Programming", 
         "Consulting Services", "Consumer Goods", "Energy", "Engineering Services", "Environmental Services",
         "Government", "Manufacturing & Industrial Systems", "Other", "Pharmaceuticals & Medicine", "Scientific Research & Development")
industry <- data.frame(sample(ind, 50, replace = T, c(0.061, 0.018, 0.079, 0.128, 0.226, 0.018, 0.189, 0.012, 0.012, 0.183, 0.037, 0.031, 0.610)))
colnames(industry) <- c("industry")

#Percent by Industry Pie
x <- c(0.061, 0.018, 0.079, 0.128, 0.226, 0.018, 0.189, 0.012, 0.012, 0.183, 0.037, 0.031, 0.610)
labels <- c("Business-Related Fields", "Chemicals, Petroleum, Plastics & Rubber", "Computer Systems - Design/Programming", 
            "Consulting Services", "Consumer Goods", "Energy", "Engineering Services", "Environmental Services",
            "Government", "Manufacturing & Industrial Systems", "Other", "Pharmaceuticals & Medicine", "Scientific Research & Development")
pie(x,labels, radius = 1, main = "Student pie chart")

#Percent by Industry Bar
